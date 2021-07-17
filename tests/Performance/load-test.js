import http from 'k6/http';
import { check, group, sleep } from 'k6';

export let options = {
    stages: [
        { duration: '5s', target: 100 }, // simulate ramp-up of traffic from 1 to 100 users over 5 secondes.
        { duration: '10s', target: 100 }, // stay at 100 users for 10 secondes
        { duration: '5s', target: 0 }, // ramp-down to 0 users
    ],
    thresholds: {
        http_req_duration: ['p(99)<1500'], // 99% of requests must complete below 1.5s
        'logged in successfully': ['p(99)<1500'], // 99% of requests must complete below 1.5s
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

    let myObjects = http.get(`${BASE_URL}/jurries`, authHeaders).json();
    check(myObjects, { 'retrieved jurries': (obj) => obj.length > 0 });

    sleep(1);
};
