import http from 'k6/http';
import { sleep } from 'k6';

export let options = {
    stages: [
        { duration: '2s', target: 100 }, // below normal load
        { duration: '5s', target: 100 },
        { duration: '2s', target: 200 }, // normal load
        { duration: '5s', target: 200 },
        { duration: '2s', target: 300 }, // around the breaking point
        { duration: '5s', target: 300 },
        { duration: '2s', target: 400 }, // beyond the breaking point
        { duration: '5s', target: 400 },
        { duration: '10s', target: 0 }, // scale down. Recovery stage.
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
