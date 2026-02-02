@extends('dashboard.layout')

@section('title', 'Dashboard')

@section('content')
    <!-- row 1 -->
    <div class="flex flex-wrap -mx-3 gap-y-4 items-stretch">
        <!-- card1 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/3 h-full flex-1">
            <div
                class="relative flex flex-col min-w-0 break-words lg:p-4 bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3 items-center">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p
                                    class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                    Total Submission</p>
                                <h1 class="mt-2 font-bold dark:text-white">{{ $submissionTotal }}</h1>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl to-blue-400 from-violet-500">
                                <i class="bx bxs-user leading-none text-2xl relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/3 h-full flex-1">
            <div
                class="relative flex flex-col min-w-0 break-words lg:p-4 bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3 items-center">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p
                                    class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                    Verified Participants</p>
                                <h1 class="mt-2 font-bold dark:text-white">{{ $verifiedParticipant }}</h1>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl to-red-500 from-orange-400">
                                <i class="leading-none bx bxs-user text-2xl relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/3 h-full flex-1">
            <div
                class="relative flex flex-col min-w-0 break-words lg:p-4 bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3 items-center">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p
                                    class="mb-0 font-sans text-sm font-semibold leading-normal uppercase dark:text-white dark:opacity-60">
                                    Unverified Participants</p>
                                <h1 class="mt-2 font-bold dark:text-white">{{ $unverifiedParticipant }}</h1>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div
                                class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-emerald-600 to-teal-400">
                                <i class="leading-none bx bxs-t-shirt text-2xl relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
