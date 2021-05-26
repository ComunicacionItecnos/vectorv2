<div class="py-4 mx-auto">
    <div class="mx-auto max-w-7xl sm:px-2 lg:px-4">
        <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="overflow-hidden shadow sm:rounded-md">
                    <div class="grid sm:grid-cols-4 sm:grid-rows-1 gap-2">
                        <div class="col-span-3 bg-red-300">
                            <form wire:submit.prevent="asigna">
                                Izquierda
                            </form>
                        </div>
                        <div class="col-span-1 flex flex-col h-screen">
                            <div class="flex-grow overflow-auto">
                                <table class="relative w-full border">
                                    <thead>
                                        <tr>
                                            <th class="sticky top-0 px-6 py-3 text-blue-900 bg-blue-300">Colaboradores
                                                premiados</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y bg-blue-100">
                                        @foreach ($colaboradores as $colaborador)
                                        <tr>
                                            <td class="px-6 py-4 text-center">
                                                <div class="flex items-center">
                                                    <div
                                                        class="rounded hidden sm:inline-block opacity-100 flex-grow-0 flex-shrink-0 w-20 h-24 border-2 shadow-sm">
                                                        @if (file_exists(public_path('storage/' . $colaborador->foto)))
                                                        <img class="w-20 rounded shadow h-24"
                                                            src="{{ asset('storage') . '/' . $colaborador->foto }}"
                                                            alt="">
                                                        @else
                                                        <img class="w-20 rounded shadow h-24"
                                                            src="{{ asset('images/user_toolkit.jpg') }}" alt="">
                                                        @endif
                                                    </div>
                                                    <div class="ml-4 whitespace-pre-line">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            <span class="sm:hidden">
                                                                {{ $colaborador->no_colaborador }}</span>
                                                            <span
                                                                class="sm:inline-block sm:-mt-6">{{ $colaborador->nombre }}
                                                                {{ $colaborador->ap_paterno }}</span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="hidden sm:inline-block opacity-100 flex-grow-0 flex-shrink-0 w-20 h-24">
                                                        <img class="px-4 mt-8 mx-2"
                                                            src="{{ asset('images/insignia.png') }}" alt="">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>