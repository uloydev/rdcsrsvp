@extends('dashboard.layout')
@section('title', $title)

@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">

            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="dark:text-white">{{ $title }} Table - Page {{ $pagination['page'] }}</h6>
                </div>
                <div class="flex flex-col sm:flex-row px-6 mt-4 mb-2 sm:justify-between">
                    @include('dashboard.fragments.table-pagesize')
                    @include('dashboard.fragments.table-search')
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <table
                            class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    @include('dashboard.fragments.table-head', [
                                        'title' => 'No',
                                        'sortable' => true,
                                        'column' => 'id',
                                        'textAlign' => 'text-center',
                                    ])
                                    @include('dashboard.fragments.table-head', ['title' => 'Nama'])
                                    @include('dashboard.fragments.table-head', [
                                        'title' => 'Email',
                                        'sortable' => true,
                                        'column' => 'email',
                                    ])
                                    @include('dashboard.fragments.table-head', ['title' => 'Phone'])
                                    @include('dashboard.fragments.table-head', [
                                        'title' => 'Kategori',
                                        'sortable' => true,
                                        'column' => 'nik',
                                        'textAlign' => 'text-center',
                                    ])
                                    @include('dashboard.fragments.table-head', ['title' => 'Additional Participant','textAlign' => 'text-center'])
                                    @include('dashboard.fragments.table-head', [
                                        'title' => 'Check In',
                                        'textAlign' => 'text-center',
                                    ])
                                    @include('dashboard.fragments.table-head', [
                                        'title' => 'Action',
                                        'textAlign' => 'text-center',
                                    ])
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($participants as $p)
                                    <tr>
                                        <td
                                            class="px-4 py-2 align-middle bg-transparent {{ $loop->last ? '' : 'border-b' }} dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <h6 class="mb-0 text-sm leading-normal dark:text-white text-center">
                                                {{ $p->id }}</h6>
                                        </td>
                                        <td
                                            class="px-4 py-2 align-middle bg-transparent {{ $loop->last ? '' : 'border-b' }} dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p
                                                class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                {{ $p->name }}</p>
                                        </td>
                                        <td
                                            class="px-4 py-2 align-middle bg-transparent {{ $loop->last ? '' : 'border-b' }} dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p
                                                class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                {{ $p->email }}</p>
                                        </td>
                                        <td
                                            class="px-4 py-2 align-middle bg-transparent {{ $loop->last ? '' : 'border-b' }} dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p
                                                class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                {{ $p->phone }}</p>
                                        </td>
                                        <td
                                            class="px-4 py-2 align-middle bg-transparent {{ $loop->last ? '' : 'border-b' }} dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <p
                                                class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-center">
                                                {{ $p->category }}</p>
                                        </td>
                                        <td
                                            class="px-4 py-2 text-sm leading-normal text-center align-middle bg-transparent {{ $loop->last ? '' : 'border-b' }} dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex justify-center">
                                            <p
                                                class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80 text-center">
                                                {{ $p->additional_participant }}</p>
                                            </div>
                                        </td>
                                        <td
                                            class="px-4 py-2 text-sm leading-normal text-center align-middle bg-transparent {{ $loop->last ? '' : 'border-b' }} dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            @if ($p->checkin_at)
                                                <p
                                                    class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                    {{ $p->checkin_at->addHours(7)->format('d M Y H:i:s') }}
                                                </p>
                                            @else
                                                <span
                                                    class="bg-gradient-to-tl from-red-800 to-red-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">Belum
                                                    Check In</span>
                                            @endif
                                        </td>
                                        <td
                                            class="px-4 py-2 text-sm leading-normal text-center align-middle bg-transparent {{ $loop->last ? '' : 'border-b' }} dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex justify-center">
                                                @if (!$p->checkin_at)
                                                    <button type="button"
                                                        class="check-in px-4 py-1 rounded-lg bg-gradient-to-tl to-green-400 from-emerald-500 text-white font-semibold hover:from-emerald-700 hover:to-green-600 transition-all hover:shadow-lg">Check
                                                        In</button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="lg:p-6">
                        {{ $participants->onEachSide(2)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    @vite('resources/js/table.js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // const ambilKit = document.querySelectorAll('.ambil-kit');
        const checkIn = document.querySelectorAll('.check-in');

        // ambilKit.forEach((btn) => {
        //     btn.addEventListener('click', async (e) => {
        //         const participantNumber = e.target.closest('tr').querySelector('td:first-child')
        //             .textContent.trim();
        //         Swal.fire({
        //             title: 'Ambil Kit',
        //             text: `Apakah Anda yakin peserta ${participantNumber} ingin mengambil kit?`,
        //             icon: 'question',
        //             showCancelButton: true,
        //             confirmButtonText: 'Ya',
        //             cancelButtonText: 'Tidak',
        //         }).then(async (result) => {
        //             if (result.isConfirmed) {
        //                 const response = await fetch(
        //                     `/dashboard/participant/${participantNumber}/pickup-kit`, {
        //                         method: 'POST',
        //                         headers: {
        //                             'Content-Type': 'application/json',
        //                             'Accept': 'application/json',
        //                             'X-CSRF-TOKEN': '{{ csrf_token() }}',
        //                         },
        //                     });
        //                 const data = await response.json();
        //                 if (response.ok) {
        //                     e.target.closest('tr').querySelectorAll('td')[2].innerHTML =
        //                         `<p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">${data.timestamp}</p>`;
        //                     e.target.remove();
        //                     Swal.fire({
        //                         title: 'Berhasil',
        //                         text: 'Peserta berhasil mengambil kit',
        //                         icon: 'success',
        //                         confirmButtonText: 'Kembali'
        //                     }).then(() => location.reload());

        //                 } else if (response.status < 500) {
        //                     Swal.fire({
        //                         title: 'Maaf...',
        //                         html: `<p class="text-left text-red-500 p-4 flex flex-col gap-y-2 text-lg rounded-lg bg-red-200">
        //                             ${data.message}
        //                         </p>`,
        //                         icon: 'error',
        //                         confirmButtonText: 'Kembali'
        //                     }).then(() => location.reload());
        //                 } else {
        //                     Swal.fire({
        //                         title: 'Maaf...',
        //                         text: 'Terjadi kesalahan saat mengambil kit',
        //                         icon: 'error',
        //                         confirmButtonText: 'Kembali'
        //                     }).then(() => location.reload());
        //                 }
        //             }
        //         });
        //     });
        // });

        checkIn.forEach((btn) => {
            btn.addEventListener('click', async (e) => {
                const participantNumber = e.target.closest('tr').querySelector('td:first-child')
                    .textContent.trim();
                Swal.fire({
                    title: 'Check In',
                    text: `Apakah Anda yakin peserta ${participantNumber} ingin check in?`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak',
                }).then(async (result) => {
                    if (result.isConfirmed) {
                        const response = await fetch(
                            `/dashboard/participant/${participantNumber}/check-in`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'Accept': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                },
                            });
                        const data = await response.json();
                        if (response.ok) {
                            e.target.closest('tr').querySelectorAll('td')[6].innerHTML =
                                `<p class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">${data.timestamp}</p>`;
                            e.target.remove();
                            Swal.fire({
                                title: 'Berhasil',
                                text: 'Participant berhasil check in',
                                icon: 'success',
                                confirmButtonText: 'Kembali'
                            });
                        } else if (response.status < 500) {
                            Swal.fire({
                                title: 'Maaf...',
                                html: `<p class="text-left text-red-500 p-4 flex flex-col gap-y-2 text-lg rounded-lg bg-red-200">
                                    ${data.message}
                                </p>`,
                                icon: 'error',
                                confirmButtonText: 'Kembali'
                            }).then(() => location.reload());
                        } else {
                            Swal.fire({
                                title: 'Maaf...',
                                text: 'Terjadi kesalahan saat check in',
                                icon: 'error',
                                confirmButtonText: 'Kembali'
                            }).then(() => location.reload());
                        }
                    }
                });
            });
        });

        function formatDateToLocal(date) {
            const optionsDate = {
                day: '2-digit',
                month: 'short',
                year: 'numeric'
            };
            const optionsTime = {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: false
            };

            const formattedDate = date.toLocaleDateString('en-GB', optionsDate);
            const formattedTime = date.toLocaleTimeString('en-GB', optionsTime);

            return `${formattedDate} ${formattedTime}`;
        }
    </script>
@endpush
