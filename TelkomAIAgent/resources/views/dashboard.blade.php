<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-white">
            📡 TELKOM AI MAINTENANCE DASHBOARD
        </h2>
    </x-slot>

    <div class="py-6">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">

                <h3 class="text-xl font-bold mb-4">
                    Daftar Site
                </h3>

                <table class="table-auto w-full border">

                    <thead class="bg-blue-600 text-white">

                    <tr>

                        <th class="border p-2">No</th>

                        <th class="border p-2">Site ID</th>

                        <th class="border p-2">Nama Site</th>

                        <th class="border p-2">Region</th>

                        <th class="border p-2">Status</th>

                        <th class="border p-2">Note</th>

                    </tr>

                    </thead>

                    <tbody>

                    @foreach($sites as $site)

                        <tr>

                            <td class="border p-2">{{ $loop->iteration }}</td>

                            <td class="border p-2">{{ $site->site_id }}</td>

                            <td class="border p-2">{{ $site->site_name }}</td>

                            <td class="border p-2">{{ $site->region }}</td>

                            <td class="border p-2">{{ $site->status }}</td>

                            <td class="border p-2">{{ $site->note }}</td>

                        </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>

            <br>

            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">

                <h3 class="text-xl font-bold mb-4">
                    Recent Telegram Log
                </h3>

                <table class="table-auto w-full border">

                    <thead class="bg-green-600 text-white">

                    <tr>

                        <th class="border p-2">No</th>

                        <th class="border p-2">Pengirim</th>

                        <th class="border p-2">Telegram ID</th>

                        <th class="border p-2">Site</th>

                        <th class="border p-2">Pesan</th>

                        <th class="border p-2">Status</th>

                        <th class="border p-2">Waktu</th>

                    </tr>

                    </thead>

                    <tbody>

                    @foreach($logs as $log)

                        <tr>

                            <td class="border p-2">{{ $loop->iteration }}</td>

                            <td class="border p-2">{{ $log->sender_name }}</td>

                            <td class="border p-2">{{ $log->telegram_id }}</td>

                            <td class="border p-2">{{ $log->site_id }}</td>

                            <td class="border p-2">{{ $log->message }}</td>

                            <td class="border p-2">

                                @if($log->status=="SUCCESS")

                                    <span class="text-green-600 font-bold">SUCCESS</span>

                                @elseif($log->status=="FAILED")

                                    <span class="text-red-600 font-bold">FAILED</span>

                                @else

                                    <span class="text-yellow-600 font-bold">{{ $log->status }}</span>

                                @endif

                            </td>

                            <td class="border p-2">

                                {{ $log->created_at->timezone('Asia/Jakarta')->format('d/m/Y H:i') }}

                            </td>

                        </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>