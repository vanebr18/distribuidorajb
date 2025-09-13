<x-app-layout>
    <!-- Breadcrumb -->
    <div x-data="{ pageName: `Tipos de Gases`}">
        @include('partials.breadcrumb')
    </div>

    <!-- ====== SECCION FORMULARIO -->
    <div
        class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="px-5 py-4 sm:px-6 sm:py-5">
            <h3
                class="text-base font-medium text-gray-800 dark:text-white/90">
                Agregar
            </h3>
        </div>
        <div
            x-data="tipoGasForm()"
            class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
            <form method="POST" action="" id="frmTipoGases">
                <div class="-mx-2.5 flex flex-wrap gap-y-5">
                    <div class="w-full px-2.5 xl:w-1/2">
                        <label
                            class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Nombre del Tipo de Gas
                        </label>
                        <input
                            type="text"
                            placeholder="Ingrese Nombre del Tipo de Gas"
                            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                    </div>

                    <div class="w-full px-2.5 xl:w-1/2">
                        <label
                            class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                            Unidad de Medida
                        </label>
                        <input
                            type="text"
                            placeholder="Ingrese Unidad de Medida"
                            maxlength="4"
                            class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" />
                    </div>

                    <div class="w-full px-2.5 flex justify-center items-center">
                        <div class="mt-1 flex items-center gap-3">
                            <button
                                type="submit"
                                class="bg-brand-500 hover:bg-brand-600 flex items-center justify-center gap-2 rounded-lg px-4 py-3 text-sm font-medium text-white">

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="10"
                                    height="10" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>

                                Guardar
                            </button>

                            <button
                                type="reset"
                                @click="resetForm"
                                class="flex items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="10"
                                    height="10" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.53 16.122a3 3 0 0 0-5.78 1.128 2.25 2.25 0 0 1-2.4 2.245 4.5 4.5 0 0 0 8.4-2.245c0-.399-.078-.78-.22-1.128Zm0 0a15.998 15.998 0 0 0 3.388-1.62m-5.043-.025a15.994 15.994 0 0 1 1.622-3.395m3.42 3.42a15.995 15.995 0 0 0 4.764-4.648l3.876-5.814a1.151 1.151 0 0 0-1.597-1.597L14.146 6.32a15.996 15.996 0 0 0-4.649 4.763m3.42 3.42a6.776 6.776 0 0 0-3.42-3.42" />
                                </svg>

                                Limpiar
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!--SECCIÓN DATATABLE -->
    <br>
    <div
        class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="px-5 py-4 sm:px-6 sm:py-5">
            <h3
                class="text-base font-medium text-gray-800 dark:text-white/90">
                Listado
            </h3>
        </div>
    </div>

    <div
        x-data="dataTableTwo()"
        class="overflow-hidden rounded-xl border border-gray-200 bg-white pt-4 dark:border-gray-800 dark:bg-white/[0.03]">

        <!-- FILTRADO -->
        <div
            class="mb-4 flex flex-col gap-2 px-4 sm:flex-row sm:items-center sm:justify-between">
            <div class="flex items-center gap-3">
                <span class="text-gray-500 dark:text-gray-400"> Mostrando </span>
                <div
                    x-data="{ isOptionSelected: false }"
                    class="relative z-20 bg-transparent">
                    <select
                        class="dark:bg-dark-900 h-9 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none py-2 pl-3 pr-8 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800"
                        :class="isOptionSelected && 'text-gray-500 dark:text-gray-400'"
                        @click="isOptionSelected = true"
                        @change="perPage = $event.target.value">
                        <option
                            value="10"
                            class="text-gray-500 dark:bg-gray-900 dark:text-gray-400">
                            10
                        </option>
                        <option
                            value="25"
                            class="text-gray-500 dark:bg-gray-900 dark:text-gray-400">
                            25
                        </option>
                        <option
                            value="50"
                            class="text-gray-500 dark:bg-gray-900 dark:text-gray-400">
                            50
                        </option>
                        <option
                            value="75"
                            class="text-gray-500 dark:bg-gray-900 dark:text-gray-400">
                            75
                        </option>
                        <option
                            value="100"
                            class="text-gray-500 dark:bg-gray-900 dark:text-gray-400">
                            100
                        </option>
                    </select>
                    <span
                        class="absolute right-2 top-1/2 z-30 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                        <svg
                            class="stroke-current"
                            width="16"
                            height="16"
                            viewBox="0 0 16 16"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3.8335 5.9165L8.00016 10.0832L12.1668 5.9165"
                                stroke=""
                                stroke-width="1.2"
                                stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
                <span class="text-gray-500 dark:text-gray-400"> registros </span>
            </div>

            <div class="relative">
                <button
                    class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                    <svg
                        class="fill-current"
                        width="20"
                        height="20"
                        viewBox="0 0 20 20"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            d="M3.04199 9.37363C3.04199 5.87693 5.87735 3.04199 9.37533 3.04199C12.8733 3.04199 15.7087 5.87693 15.7087 9.37363C15.7087 12.8703 12.8733 15.7053 9.37533 15.7053C5.87735 15.7053 3.04199 12.8703 3.04199 9.37363ZM9.37533 1.54199C5.04926 1.54199 1.54199 5.04817 1.54199 9.37363C1.54199 13.6991 5.04926 17.2053 9.37533 17.2053C11.2676 17.2053 13.0032 16.5344 14.3572 15.4176L17.1773 18.238C17.4702 18.5309 17.945 18.5309 18.2379 18.238C18.5308 17.9451 18.5309 17.4703 18.238 17.1773L15.4182 14.3573C16.5367 13.0033 17.2087 11.2669 17.2087 9.37363C17.2087 5.04817 13.7014 1.54199 9.37533 1.54199Z"
                            fill="" />
                    </svg>
                </button>

                <input
                    type="text"
                    x-model="search"
                    placeholder="Buscar..."
                    class="dark:bg-dark-900 h-11 w-full rounded-lg border border-gray-300 bg-transparent py-2.5 pl-11 pr-4 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-brand-300 focus:outline-hidden focus:ring-3 focus:ring-brand-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-brand-800 xl:w-[300px]" />
            </div>
        </div>
        <div class="max-w-full overflow-x-auto">
            <div class="min-w-[1102px]">

                <!-- CABECERA DE LA TABLA -->
                <div
                    class="grid grid-cols-11 border-t border-gray-200 dark:border-gray-800">
                    <div
                        class="col-span-1 flex items-center border-r border-gray-200 px-4 py-3 dark:border-gray-800">
                        <div
                            class="flex w-full cursor-pointer items-center justify-between"
                            @click="sortBy('user')">
                            <p
                                class="text-theme-xs font-medium text-gray-700 dark:text-gray-400">
                                ID
                            </p>

                            <span class="flex flex-col gap-0.5">
                                <svg
                                    class="fill-gray-300 dark:fill-gray-700"
                                    width="8"
                                    height="5"
                                    viewBox="0 0 8 5"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.40962 0.585167C4.21057 0.300808 3.78943 0.300807 3.59038 0.585166L1.05071 4.21327C0.81874 4.54466 1.05582 5 1.46033 5H6.53967C6.94418 5 7.18126 4.54466 6.94929 4.21327L4.40962 0.585167Z"
                                        fill="" />
                                </svg>

                                <svg
                                    class="fill-gray-300 dark:fill-gray-700"
                                    width="8"
                                    height="5"
                                    viewBox="0 0 8 5"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.40962 4.41483C4.21057 4.69919 3.78943 4.69919 3.59038 4.41483L1.05071 0.786732C0.81874 0.455343 1.05582 0 1.46033 0H6.53967C6.94418 0 7.18126 0.455342 6.94929 0.786731L4.40962 4.41483Z"
                                        fill="" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div
                        class="col-span-5 flex items-center border-r border-gray-200 px-4 py-3 dark:border-gray-800">
                        <div
                            class="flex w-full cursor-pointer items-center justify-between"
                            @click="sortBy('position')">
                            <p
                                class="text-theme-xs font-medium text-gray-700 dark:text-gray-400">
                                Nombre
                            </p>

                            <span class="flex flex-col gap-0.5">
                                <svg
                                    class="fill-gray-300 dark:fill-gray-700"
                                    width="8"
                                    height="5"
                                    viewBox="0 0 8 5"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.40962 0.585167C4.21057 0.300808 3.78943 0.300807 3.59038 0.585166L1.05071 4.21327C0.81874 4.54466 1.05582 5 1.46033 5H6.53967C6.94418 5 7.18126 4.54466 6.94929 4.21327L4.40962 0.585167Z"
                                        fill="" />
                                </svg>

                                <svg
                                    class="fill-gray-300 dark:fill-gray-700"
                                    width="8"
                                    height="5"
                                    viewBox="0 0 8 5"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.40962 4.41483C4.21057 4.69919 3.78943 4.69919 3.59038 4.41483L1.05071 0.786732C0.81874 0.455343 1.05582 0 1.46033 0H6.53967C6.94418 0 7.18126 0.455342 6.94929 0.786731L4.40962 4.41483Z"
                                        fill="" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div
                        class="col-span-4 flex items-center border-r border-gray-200 px-4 py-3 dark:border-gray-800">
                        <div
                            class="flex w-full cursor-pointer items-center justify-between"
                            @click="sortBy('office')">
                            <p
                                class="text-theme-xs font-medium text-gray-700 dark:text-gray-400">
                                Unidad de Medida
                            </p>

                            <span class="flex flex-col gap-0.5">
                                <svg
                                    class="fill-gray-300 dark:fill-gray-700"
                                    width="8"
                                    height="5"
                                    viewBox="0 0 8 5"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.40962 0.585167C4.21057 0.300808 3.78943 0.300807 3.59038 0.585166L1.05071 4.21327C0.81874 4.54466 1.05582 5 1.46033 5H6.53967C6.94418 5 7.18126 4.54466 6.94929 4.21327L4.40962 0.585167Z"
                                        fill="" />
                                </svg>

                                <svg
                                    class="fill-gray-300 dark:fill-gray-700"
                                    width="8"
                                    height="5"
                                    viewBox="0 0 8 5"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.40962 4.41483C4.21057 4.69919 3.78943 4.69919 3.59038 4.41483L1.05071 0.786732C0.81874 0.455343 1.05582 0 1.46033 0H6.53967C6.94418 0 7.18126 0.455342 6.94929 0.786731L4.40962 4.41483Z"
                                        fill="" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <!-- ACCIONES -->
                    <div
                        class="col-span-1 flex items-center border-r border-gray-200 px-4 py-3 dark:border-gray-800">
                        <div class="flex w-full cursor-pointer items-center justify-between">
                            <p
                                class="text-theme-xs font-medium text-gray-700 dark:text-gray-400">
                                Acciones
                            </p>

                            <span class="flex flex-col gap-0.5">
                                <svg
                                    class="fill-gray-300 dark:fill-gray-700"
                                    width="8"
                                    height="5"
                                    viewBox="0 0 8 5"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.40962 0.585167C4.21057 0.300808 3.78943 0.300807 3.59038 0.585166L1.05071 4.21327C0.81874 4.54466 1.05582 5 1.46033 5H6.53967C6.94418 5 7.18126 4.54466 6.94929 4.21327L4.40962 0.585167Z"
                                        fill="" />
                                </svg>

                                <svg
                                    class="fill-gray-300 dark:fill-gray-700"
                                    width="8"
                                    height="5"
                                    viewBox="0 0 8 5"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4.40962 4.41483C4.21057 4.69919 3.78943 4.69919 3.59038 4.41483L1.05071 0.786732C0.81874 0.455343 1.05582 0 1.46033 0H6.53967C6.94418 0 7.18126 0.455342 6.94929 0.786731L4.40962 4.41483Z"
                                        fill="" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- BODY DE LA TABLA -->
                <template x-for="person in paginatedData" :key="person.id">
                    <!-- table item -->
                    <div
                        class="grid grid-cols-11 border-t border-gray-100 dark:border-gray-800">
                        <div
                            class="col-span-1 flex items-center border-r border-gray-100 px-4 py-[17.5px] dark:border-gray-800">
                            <p
                                class="block text-theme-sm font-medium text-gray-800 dark:text-white/90"
                                x-text="person.id">
                                1
                            </p>
                        </div>
                        <div
                            class="col-span-5 flex items-center border-r border-gray-100 px-4 py-[17.5px] dark:border-gray-800">
                            <p
                                class="text-theme-sm text-gray-700 dark:text-gray-400"
                                x-text="person.name"></p>
                        </div>
                        <div
                            class="col-span-4 flex items-center border-r border-gray-100 px-4 py-[17.5px] dark:border-gray-800">
                            <p
                                class="text-theme-sm text-gray-700 dark:text-gray-400"
                                x-text="person.position"></p>
                        </div>
                        <div class="col-span-1 flex items-center px-4 py-[17.5px]">
                            <div class="flex w-full items-center gap-2">
                                <!-- ELIMINAR -->
                                <button
                                    class="text-gray-500 hover:text-error-500 dark:text-gray-400 dark:hover:text-error-500">
                                    <svg
                                        class="fill-current"
                                        width="21"
                                        height="21"
                                        viewBox="0 0 21 21"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M7.04142 4.29199C7.04142 3.04935 8.04878 2.04199 9.29142 2.04199H11.7081C12.9507 2.04199 13.9581 3.04935 13.9581 4.29199V4.54199H16.1252H17.166C17.5802 4.54199 17.916 4.87778 17.916 5.29199C17.916 5.70621 17.5802 6.04199 17.166 6.04199H16.8752V8.74687V13.7469V16.7087C16.8752 17.9513 15.8678 18.9587 14.6252 18.9587H6.37516C5.13252 18.9587 4.12516 17.9513 4.12516 16.7087V13.7469V8.74687V6.04199H3.8335C3.41928 6.04199 3.0835 5.70621 3.0835 5.29199C3.0835 4.87778 3.41928 4.54199 3.8335 4.54199H4.87516H7.04142V4.29199ZM15.3752 13.7469V8.74687V6.04199H13.9581H13.2081H7.79142H7.04142H5.62516V8.74687V13.7469V16.7087C5.62516 17.1229 5.96095 17.4587 6.37516 17.4587H14.6252C15.0394 17.4587 15.3752 17.1229 15.3752 16.7087V13.7469ZM8.54142 4.54199H12.4581V4.29199C12.4581 3.87778 12.1223 3.54199 11.7081 3.54199H9.29142C8.87721 3.54199 8.54142 3.87778 8.54142 4.29199V4.54199ZM8.8335 8.50033C9.24771 8.50033 9.5835 8.83611 9.5835 9.25033V14.2503C9.5835 14.6645 9.24771 15.0003 8.8335 15.0003C8.41928 15.0003 8.0835 14.6645 8.0835 14.2503V9.25033C8.0835 8.83611 8.41928 8.50033 8.8335 8.50033ZM12.9168 9.25033C12.9168 8.83611 12.581 8.50033 12.1668 8.50033C11.7526 8.50033 11.4168 8.83611 11.4168 9.25033V14.2503C11.4168 14.6645 11.7526 15.0003 12.1668 15.0003C12.581 15.0003 12.9168 14.6645 12.9168 14.2503V9.25033Z"
                                            fill="" />
                                    </svg>
                                </button>
                                <!-- EDITAR -->
                                <button
                                    class="text-gray-500 hover:text-gray-800 dark:text-gray-400 dark:hover:text-white/90">
                                    <svg
                                        class="fill-current"
                                        width="21"
                                        height="21"
                                        viewBox="0 0 21 21"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M17.0911 3.53206C16.2124 2.65338 14.7878 2.65338 13.9091 3.53206L5.6074 11.8337C5.29899 12.1421 5.08687 12.5335 4.99684 12.9603L4.26177 16.445C4.20943 16.6931 4.286 16.9508 4.46529 17.1301C4.64458 17.3094 4.90232 17.3859 5.15042 17.3336L8.63507 16.5985C9.06184 16.5085 9.45324 16.2964 9.76165 15.988L18.0633 7.68631C18.942 6.80763 18.942 5.38301 18.0633 4.50433L17.0911 3.53206ZM14.9697 4.59272C15.2626 4.29982 15.7375 4.29982 16.0304 4.59272L17.0027 5.56499C17.2956 5.85788 17.2956 6.33276 17.0027 6.62565L16.1043 7.52402L14.0714 5.49109L14.9697 4.59272ZM13.0107 6.55175L6.66806 12.8944C6.56526 12.9972 6.49455 13.1277 6.46454 13.2699L5.96704 15.6283L8.32547 15.1308C8.46772 15.1008 8.59819 15.0301 8.70099 14.9273L15.0436 8.58468L13.0107 6.55175Z"
                                            fill="" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <!-- PAGINACIÓN -->
        <div
            class="border-t border-gray-100 py-4 pl-[18px] pr-4 dark:border-gray-800">
            <div class="flex flex-col xl:flex-row xl:items-center xl:justify-between">
                <div
                    class="flex items-center justify-center gap-0.5 pb-4 xl:justify-normal xl:pt-0">
                    <button
                        @click="prevPage()"
                        class="mr-2.5 flex items-center justify-center rounded-lg border border-gray-300 bg-white px-3.5 py-2.5 text-gray-700 shadow-theme-xs hover:bg-gray-50 disabled:opacity-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03]"
                        :disabled="currentPage === 1">
                        Anterior
                    </button>

                    <button
                        @click="goToPage(1)"
                        :class="currentPage === 1 ? 'bg-blue-500/[0.08] text-brand-500' : 'text-gray-700 dark:text-gray-400'"
                        class="flex h-10 w-10 items-center justify-center rounded-lg text-sm font-medium hover:bg-blue-500/[0.08] hover:text-brand-500 dark:hover:text-brand-500">
                        1
                    </button>

                    <template x-if="currentPage > 3">
                        <span
                            class="flex h-10 w-10 items-center justify-center rounded-lg hover:bg-blue-500/[0.08] hover:text-brand-500 dark:hover:text-brand-500">...</span>
                    </template>

                    <template x-for="page in pagesAroundCurrent" :key="page">
                        <button
                            @click="goToPage(page)"
                            :class="currentPage === page ? 'bg-blue-500/[0.08] text-brand-500' : 'text-gray-700 dark:text-gray-400'"
                            class="flex h-10 w-10 items-center justify-center rounded-lg text-sm font-medium hover:bg-blue-500/[0.08] hover:text-brand-500 dark:hover:text-brand-500">
                            <span x-text="page"></span>
                        </button>
                    </template>

                    <template x-if="currentPage < totalPages - 2">
                        <span
                            class="flex h-10 w-10 items-center justify-center rounded-lg text-sm font-medium text-gray-700 hover:bg-blue-500/[0.08] hover:text-brand-500 dark:text-gray-400 dark:hover:text-brand-500">...</span>
                    </template>

                    <button
                        @click="nextPage()"
                        class="ml-2.5 flex items-center justify-center rounded-lg border border-gray-300 bg-white px-3.5 py-2.5 text-gray-700 shadow-theme-xs hover:bg-gray-50 disabled:opacity-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03]"
                        :disabled="currentPage === totalPages">
                        Siguiente
                    </button>
                </div>

                <p
                    class="border-t border-gray-100 pt-3 text-center text-sm font-medium text-gray-500 dark:border-gray-800 dark:text-gray-400 xl:border-t-0 xl:pt-0 xl:text-left">
                    Mostrando <span x-text="startEntry"></span> al
                    <span x-text="endEntry"></span> de
                    <span x-text="totalEntries"></span> registros
                </p>
            </div>
        </div>
    </div>

    <script>
        const res = await fetch('/tipogases', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                nombre: this.descripcion,
                unidad: this.uni_medida
            })
        });

        function dataTableTwo() {


            return {
                search: "",
                sortColumn: "id",
                sortDirection: "asc",
                currentPage: 1,
                perPage: 10,
                data: [{
                        id: 1,
                        name: "Lindsey Curtis",
                        position: "Sales Assistant",
                    },
                    {
                        id: 2,
                        name: "Kaiya George",
                        position: "Sales Assistant",
                    },
                    {
                        id: 3,
                        name: "Zain Geidt",
                        position: "Sales Assistant",
                    },
                    {
                        id: 4,
                        name: "Abram Schleifer",
                        position: "Sales Assistant",
                    },
                    {
                        id: 5,
                        name: "Carla George",
                        position: "Sales Assistant",
                    },
                    {
                        id: 6,
                        name: "Emery Culhane",
                        position: "Sales Assistant",
                    },
                    {
                        id: 7,
                        name: "Livia Donin",
                        position: "Sales Assistant",
                    },
                    {
                        id: 8,
                        name: "Miracle Bator",
                        position: "Sales Assistant",
                    },
                    {
                        id: 9,
                        name: "Lincoln Herwitz",
                        position: "Sales Assistant",
                    },
                    {
                        id: 10,
                        name: "Ekstrom Bothman",
                        position: "Sales Assistant",
                    },
                    {
                        id: 11,
                        name: "Lindsey Curtis",
                        position: "Sales Assistant",
                    },
                    {
                        id: 12,
                        name: "Kaiya George",
                        position: "Sales Assistant",
                    },
                    {
                        id: 13,
                        name: "Zain Geidt",
                        position: "Sales Assistant",
                    },
                    {
                        id: 14,
                        name: "Abram Schleifer",
                        position: "Sales Assistant",
                    },
                    {
                        id: 15,
                        name: "Carla George",
                        position: "Sales Assistant",
                    },
                    {
                        id: 16,
                        name: "Emery Culhane",
                        position: "Sales Assistant",
                    },
                    {
                        id: 17,
                        name: "Livia Donin",
                        position: "Sales Assistant",
                    },
                    {
                        id: 18,
                        name: "Miracle Bator",
                        position: "Sales Assistant",
                    },
                    {
                        id: 19,
                        name: "Lincoln Herwitz",
                        position: "Sales Assistant",
                    },
                    {
                        id: 20,
                        name: "Ekstrom Bothman",
                        position: "Sales Assistant",
                    },
                    {
                        id: 21,
                        name: "Lindsey Curtis",
                        position: "Sales Assistant",
                    },
                    {
                        id: 22,
                        name: "Kaiya George",
                        position: "Sales Assistant",
                    },
                    {
                        id: 23,
                        name: "Zain Geidt",
                        position: "Sales Assistant",
                    },
                    {
                        id: 24,
                        name: "Abram Schleifer",
                        position: "Sales Assistant",
                    },
                    {
                        id: 25,
                        name: "Carla George",
                        position: "Sales Assistant",
                    },
                ],

                get pagesAroundCurrent() {
                    let pages = [];
                    const startPage = Math.max(2, this.currentPage - 2);
                    const endPage = Math.min(this.totalPages - 1, this.currentPage + 2);

                    for (let i = startPage; i <= endPage; i++) {
                        pages.push(i);
                    }
                    return pages;
                },

                get filteredData() {
                    const searchLower = this.search.toLowerCase();
                    return this.data
                        .filter(
                            (person) =>
                            person.name.toLowerCase().includes(searchLower) ||
                            person.position.toLowerCase().includes(searchLower),
                        )
                        .sort((a, b) => {
                            let modifier = this.sortDirection === "asc" ? 1 : -1;
                            if (a[this.sortColumn] < b[this.sortColumn]) return -1 * modifier;
                            if (a[this.sortColumn] > b[this.sortColumn]) return 1 * modifier;
                            return 0;
                        });
                },

                get paginatedData() {
                    const start = (this.currentPage - 1) * this.perPage;
                    const end = start + this.perPage;
                    return this.filteredData.slice(start, end);
                },

                get totalEntries() {
                    return this.filteredData.length;
                },

                get startEntry() {
                    return (this.currentPage - 1) * this.perPage + 1;
                },

                get endEntry() {
                    const end = this.currentPage * this.perPage;
                    return end > this.totalEntries ? this.totalEntries : end;
                },

                get totalPages() {
                    return Math.ceil(this.filteredData.length / this.perPage);
                },

                goToPage(page) {
                    if (page >= 1 && page <= this.totalPages) {
                        this.currentPage = page;
                    }
                },

                nextPage() {
                    if (this.currentPage < this.totalPages) {
                        this.currentPage++;
                    }
                },

                prevPage() {
                    if (this.currentPage > 1) {
                        this.currentPage--;
                    }
                },

                sortBy(column) {
                    if (this.sortColumn === column) {
                        this.sortDirection = this.sortDirection === "asc" ? "desc" : "asc";
                    } else {
                        this.sortDirection = "asc";
                        this.sortColumn = column;
                    }
                },
            };
        }
    </script>
    <!-- DataTable Two -->

    <script>
        function dropdown() {
            return {
                options: [],
                selected: [],
                show: false,
                open() {
                    this.show = true;
                },
                close() {
                    this.show = false;
                },
                isOpen() {
                    return this.show === true;
                },
                select(index, event) {
                    if (!this.options[index].selected) {
                        this.options[index].selected = true;
                        this.options[index].element = event.target;
                        this.selected.push(index);
                    } else {
                        this.selected.splice(this.selected.lastIndexOf(index), 1);
                        this.options[index].selected = false;
                    }
                },
                remove(index, option) {
                    this.options[option].selected = false;
                    this.selected.splice(index, 1);
                },
                loadOptions() {
                    const options = document.getElementById("select").options;
                    for (let i = 0; i < options.length; i++) {
                        this.options.push({
                            value: options[i].value,
                            text: options[i].innerText,
                            selected: options[i].getAttribute("selected") != null ?
                                options[i].getAttribute("selected") : false,
                        });
                    }
                },
                selectedValues() {
                    return this.selected.map((option) => {
                        return this.options[option].value;
                    });
                },
            };
        }
    </script>
</x-app-layout>