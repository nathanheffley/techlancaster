<x-app>
    <div class="relative my-8 px-4 sm:px-6 lg:px-8">
        <div class="text-lg max-w-prose mx-auto mb-6">
            <p class="text-base text-center leading-6 text-indigo-600 font-semibold tracking-wide uppercase">
                <a href="https://lancastersoftware.co/">
                    Lancaster Software Co.
                </a>
            </p>
            <h1 class="mt-2 mb-8 text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl sm:leading-10">
                Laravel Template
            </h1>
            <p class="text-xl text-gray-500 leading-8">
                A laravel template that comes with Docker, Tailwind, PostgreSQL, a dedicated queue worker with Redis, and authentication out of the box. Perfect for getting your team started on a new Laravel project as quick as possible.
            </p>
        </div>
        <div class="prose prose-lg text-gray-500 mx-auto">
            <h2>Features</h2>
            <ul>
                <li>
                    <strong>Docker</strong>
                    &middot;
                    Comes with Docker already configured, so there's no more worrying about setting up your dev environment.
                </li>

                <li>
                    <strong>Tailwind CSS</strong>
                    &middot;
                    Comes with Tailwind CSS installed by default, so you can get started building views immediately without messing around with CSS.
                </li>

                <li>
                    <strong>PostgreSQL</strong>
                    &middot;
                    Comes with a PostgreSQL database, which you can easily swap out for something else by editing `docker-compose.yml` if you prefer a different system.
                </li>

                <li>
                    <strong>Dedicated Queue Worker (Redis)</strong>
                    &middot;
                    Comes with a dedicated queue worker instance that runs on Redis. With a dedicated queue worker you won't have to worry about managing a worker yourself or having sync jobs behaving differently from production.
                </li>

                <li>
                    <strong>Authentication</strong>
                    &middot;
                    Comes with the default auth scaffolding (using Tailwind instead of Bootstrap for all the default pages, of course) because what application doesn't have user authentication these days?
                </li>
            </ul>
        </div>
    </div>
</x-app>
