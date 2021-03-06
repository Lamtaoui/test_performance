import http from 'k6/http';
import { sleep } from 'k6';

export let options = {
    stages: [
        { duration: '10s', target: 100 }, // below normal load
        { duration: '1m', target: 100 },
        { duration: '10s', target: 1500 }, // spike to 1500 users
        { duration: '3m', target: 1500 }, // stay at 1500 for 3 minutes
        { duration: '10s', target: 100 }, // scale down. Recovery stage.
        { duration: '3m', target: 100 },
        { duration: '10s', target: 0 },
    ],
};

export default function () {
    const BASE_URL = 'http://localhost:8000';

    let responses = http.batch([
        [
            'GET',
            `${BASE_URL}/api/jurries/1/`,
            null,
            { tags: { name: 'Jurries' } },
        ],
        [
            'GET',
            `${BASE_URL}/api/jurries/2/`,
            null,
            { tags: { name: 'Jurries' } },
        ],
        [
            'GET',
            `${BASE_URL}/api/jurries/3/`,
            null,
            { tags: { name: 'Jurries' } },
        ],
        [
            'GET',
            `${BASE_URL}/api/jurries/4/`,
            null,
            { tags: { name: 'Jurries' } },
        ],
    ]);

    sleep(1);
}
