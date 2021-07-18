import http from 'k6/http';
import { check, group, sleep, fail } from 'k6';

export let options = {
    vus: 1, // 1 user looping for 5s
    duration: '5s',

    thresholds: {
        http_req_duration: ['p(90)<1000', 'p(99.9) < 2000'], // 90% of requests must complete below 1s and 99% finish below 2s
        http_req_failed: ['rate<0.01']   // http errors should be less than 1%
    },
};

const BASE_URL = 'http://localhost:8000';
const USERNAME = 'maximedaude.test@gmail.com';
const PASSWORD = 'maximedaude.test@gmail.com';

export default () => {
    let loginRes = http.post(`${BASE_URL}/login/`, {
        username: USERNAME,
        password: PASSWORD,
    });

    check(loginRes, {
        'logged in successfully': (resp) => resp.json('access') !== '',
    });

    let authHeaders = {
        headers: {
            Authorization: `Bearer ${loginRes.json('access')}`,
        },
    };

    let myObjects = http.get(`${BASE_URL}/api/jurries`, authHeaders).json();
    check(myObjects, { 'retrieved jurries': (obj) => obj.length > 0 });

    sleep(1);
};
