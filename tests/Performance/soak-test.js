import http from 'k6/http';
import { sleep } from 'k6';

export let options = {
    stages: [
        { duration: '5s', target: 400 }, // ramp up to 400 users
        { duration: '2h', target: 400 }, // stay at 400 for 2 hours
        { duration: '5s', target: 0 }, // scale down. (optional)
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
