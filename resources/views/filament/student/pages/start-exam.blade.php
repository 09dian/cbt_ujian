<x-filament-panels::page>

<div class="grid grid-cols-12 gap-4">

    <!-- Sidebar Nomor Soal -->
    <div class="col-span-3">

        <div class="bg-white rounded-lg shadow p-4">

            <h2 class="text-lg font-bold mb-4">
                Nomor Soal
            </h2>

            <div class="grid grid-cols-4 gap-2">

                @foreach($this->exam->questions as $question)

                    <button
                        type="button"
                        class="h-10 rounded bg-gray-200 hover:bg-blue-500 hover:text-white"
                    >
                        {{ $loop->iteration }}
                    </button>

                @endforeach

            </div>

            <hr class="my-4">

            <div class="text-sm">

                <div class="flex items-center gap-2 mb-2">
                    <div class="w-4 h-4 bg-green-500 rounded"></div>
                    <span>Sudah Dijawab</span>
                </div>

                <div class="flex items-center gap-2">
                    <div class="w-4 h-4 bg-gray-300 rounded"></div>
                    <span>Belum Dijawab</span>
                </div>

            </div>

        </div>

    </div>

    <!-- Area Soal -->
    <div class="col-span-9">

        <div class="bg-white rounded-lg shadow p-6">

            <div class="flex justify-between items-center mb-6">

                <h1 class="text-2xl font-bold">
                    {{ $this->exam->title }}
                </h1>

                <div class="text-red-600 font-bold text-lg">
                    ⏰ 01:30:00
                </div>

            </div>

            @php
                $question = $this->exam->questions->first();
            @endphp

            @if($question)

                <div class="mb-6">

                    <h3 class="text-lg font-semibold mb-4">
                        1. {{ $question->question }}
                    </h3>

                    <div class="space-y-3">

                        <label class="block border rounded p-3 cursor-pointer">
                            <input type="radio" name="answer" value="A">
                            A. {{ $question->option_a }}
                        </label>

                        <label class="block border rounded p-3 cursor-pointer">
                            <input type="radio" name="answer" value="B">
                            B. {{ $question->option_b }}
                        </label>

                        <label class="block border rounded p-3 cursor-pointer">
                            <input type="radio" name="answer" value="C">
                            C. {{ $question->option_c }}
                        </label>

                        <label class="block border rounded p-3 cursor-pointer">
                            <input type="radio" name="answer" value="D">
                            D. {{ $question->option_d }}
                        </label>

                    </div>

                </div>

            @else

                <div class="p-4 bg-yellow-100 rounded">
                    Belum ada soal pada ujian ini.
                </div>

            @endif

            <hr class="my-6">

            <div class="flex justify-between">

                <button
                    type="button"
                    class="px-4 py-2 bg-gray-500 text-white rounded"
                >
                    Sebelumnya
                </button>

                <button
                    type="button"
                    class="px-4 py-2 bg-blue-600 text-white rounded"
                >
                    Selanjutnya
                </button>

            </div>

            <div class="mt-6 text-right">

                <button
                    type="button"
                    class="px-6 py-3 bg-green-600 text-white rounded-lg"
                >
                    Selesai Ujian
                </button>

            </div>

        </div>

    </div>

</div>

</x-filament-panels::page>
