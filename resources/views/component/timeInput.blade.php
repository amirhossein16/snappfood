<div class="mb-6">
    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center justify-center" id="myTab"
            data-tabs-toggle="#myTabContent" role="tablist">
            <li class="mr-2" role="presentation">
                <button
                    class="inline-block p-4 rounded-t-lg border-b-2 text-blue-600 hover:text-blue-600 dark:text-blue-500 dark:hover:text-blue-500 border-blue-600 dark:border-blue-500"
                    id="monday-tab" data-tabs-target="#monday" type="button" role="tab"
                    aria-controls="monday" aria-selected="true">monday
                </button>
            </li>
            <li class="mr-2" role="presentation">
                <button
                    class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700"
                    id="tuesday-tab" data-tabs-target="#tuesday" type="button" role="tab"
                    aria-controls="tuesday" aria-selected="false">tuesday
                </button>
            </li>
            <li class="mr-2" role="presentation">
                <button
                    class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700"
                    id="wednesday-tab" data-tabs-target="#wednesday" type="button" role="tab"
                    aria-controls="wednesday" aria-selected="false">wednesday
                </button>
            </li>
            <li class="mr-2" role="presentation">
                <button
                    class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700"
                    id="thursday-tab" data-tabs-target="#thursday" type="button" role="tab"
                    aria-controls="thursday" aria-selected="false">thursday
                </button>
            </li>
            <li class="mr-2" role="presentation">
                <button
                    class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700"
                    id="friday-tab" data-tabs-target="#friday" type="button" role="tab"
                    aria-controls="friday" aria-selected="false">friday
                </button>
            </li>
            <li class="mr-2" role="presentation">
                <button
                    class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700"
                    id="saturday-tab" data-tabs-target="#saturday" type="button" role="tab"
                    aria-controls="saturday" aria-selected="false">saturday
                </button>
            </li>
            <li role="presentation">
                <button
                    class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700"
                    id="sunday-tab" data-tabs-target="#sunday" type="button" role="tab"
                    aria-controls="sunday" aria-selected="false">sunday
                </button>
            </li>
        </ul>
    </div>
    <div id="myTabContent">
        <div class="p-4 bg-gray-50 flex flex-row rounded-lg dark:bg-gray-800 items-center"
             id="monday" role="tabpanel" aria-labelledby="monday-tab">
            <div>
                <label for="default-toggle"
                       class="inline-flex relative items-center cursor-pointer">
                    <span class="ml-3 text-xl font-bold text-gray-900 dark:text-blue-500">Monday AM</span>
                </label>
                <x-jet-button id="mondayAM" onclick="hideShow('mondayAM','mondayAMSelection','mondayAMClosed')"
                              class="bg-indigo-500 ml-4 mb-2 dark:text-blue-100">Open / Close
                </x-jet-button>
                <div class="flex justify-start" id="mondayAMSelection">
                    <div class="timepicker relative form-floating mb-3 xl:w-48"
                         data-mdb-with-icon="false" id="input-toggle-timepicker">
                        <input type="text" wire:model.defer="OpeningHours.mondayAMStart"
                               class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                               placeholder="Select a date"
                               data-mdb-toggle="input-toggle-timepicker"/>
                        <x-jet-input-error for="OpeningHours.mondayAMStart" class="mt-2"/>

                        <label for="floatingInput" class="text-gray-700">Select a time</label>
                    </div>
                    <span class="text-white top-4 mx-1.5 relative">TO</span>
                    <div class="timepicker relative form-floating mb-3 xl:w-48"
                         data-mdb-with-icon="false" id="input-toggle-timepicker">
                        <input type="text" wire:model.defer="OpeningHours.mondayAMEnd"
                               class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                               placeholder="Select a date"
                               data-mdb-toggle="input-toggle-timepicker"/>
                        <x-jet-input-error for="OpeningHours.mondayAMEnd" class="mt-2"/>

                        <label for="floatingInput" class="text-gray-700">Select a time</label>
                    </div>
                </div>
                <div class="flex justify-start hidden" id="mondayAMClosed">
                    <span class="text-xl text-red-500 font-bold">Closed</span>
                </div>
            </div>
            <div class="ml-auto">
                <label for="default-toggle"
                       class="inline-flex relative items-center cursor-pointer">
                    <span class="ml-3 text-xl font-bold text-gray-900 dark:text-blue-500">Monday PM</span>
                </label>
                <x-jet-button id="mondayPM" onclick="hideShow('mondayPM','mondayPMSelection','mondayPMClosed')"
                              class="bg-indigo-500 ml-4 mb-2 dark:text-blue-100">Open / Close
                </x-jet-button>
                <div class="flex justify-start" id="mondayPMSelection">
                    <div class="timepicker relative form-floating mb-3 xl:w-48"
                         data-mdb-with-icon="false" id="input-toggle-timepicker">
                        <input type="text" wire:model.defer="OpeningHours.mondayPMStart"
                               class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                               placeholder="Select a date"
                               data-mdb-toggle="input-toggle-timepicker"/>
                        <x-jet-input-error for="OpeningHours.mondayPMStart" class="mt-2"/>
                        <label for="floatingInput" class="text-gray-700">Select a time</label>
                    </div>
                    <span class="text-white top-4 mx-1.5 relative">TO</span>
                    <div class="timepicker relative form-floating mb-3 xl:w-48"
                         data-mdb-with-icon="false" id="input-toggle-timepicker">
                        <input type="text" wire:model.defer="OpeningHours.mondayPMEnd"
                               class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                               placeholder="Select a date"
                               data-mdb-toggle="input-toggle-timepicker"/>
                        <x-jet-input-error for="OpeningHours.mondayPMEnd" class="mt-2"/>

                        <label for="floatingInput" class="text-gray-700">Select a time</label>
                    </div>
                </div>
                <div class="flex justify-start hidden" id="mondayPMClosed">
                    <span class="text-xl text-red-500 font-bold">Closed</span>
                </div>
            </div>
        </div>
        <div class="p-4 bg-gray-50 flex flex-row rounded-lg dark:bg-gray-800" id="tuesday" role="tabpanel"
             aria-labelledby="tuesday-tab">
            <div>
                <label for="default-toggle"
                       class="inline-flex relative items-center cursor-pointer">
                    <span class="ml-3 text-xl font-bold text-gray-900 dark:text-blue-500">Tuesday AM</span>
                </label>
                <x-jet-button id="tuesdayAM" onclick="hideShow('tuesdayAM','tuesdayAMSelection','tuesdayAMClosed')"
                              class="bg-indigo-500 ml-4 mb-2 dark:text-blue-100">Open / Close
                </x-jet-button>
                <div class="flex justify-start" id="tuesdayAMSelection">
                    <div class="timepicker relative form-floating mb-3 xl:w-48"
                         data-mdb-with-icon="false" id="input-toggle-timepicker">
                        <input type="text" wire:model.defer="OpeningHours.tuesdayAMStart"
                               class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                               placeholder="Select a date"
                               data-mdb-toggle="input-toggle-timepicker"/>
                        <label for="floatingInput" class="text-gray-700">Select a time</label>
                    </div>
                    <span class="text-white top-4 mx-1.5 relative">TO</span>
                    <div class="timepicker relative form-floating mb-3 xl:w-48"
                         data-mdb-with-icon="false" id="input-toggle-timepicker">
                        <input type="text" wire:model.defer="OpeningHours.tuesdayAMEnd"
                               class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                               placeholder="Select a date"
                               data-mdb-toggle="input-toggle-timepicker"/>
                        <label for="floatingInput" class="text-gray-700">Select a time</label>
                    </div>
                </div>
                <div class="flex justify-start hidden" id="tuesdayAMClosed">
                    <span class="text-xl text-red-500 font-bold">Closed</span>
                </div>
            </div>
            <div class="ml-auto">
                <label for="default-toggle"
                       class="inline-flex relative items-center cursor-pointer">
                    <span class="ml-3 text-xl font-bold text-gray-900 dark:text-blue-500">Tuesday PM</span>
                </label>
                <x-jet-button id="tuesdayPM" onclick="hideShow('tuesdayPM','tuesdayPMSelection','tuesdayPMClosed')"
                              class="bg-indigo-500 ml-4 mb-2 dark:text-blue-100">Open / Close
                </x-jet-button>
                <div class="flex justify-start" id="tuesdayPMSelection">
                    <div class="timepicker relative form-floating mb-3 xl:w-48"
                         data-mdb-with-icon="false" id="input-toggle-timepicker">
                        <input type="text" wire:model.defer="OpeningHours.tuesdayPMStart"
                               class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                               placeholder="Select a date"
                               data-mdb-toggle="input-toggle-timepicker"/>
                        <label for="floatingInput" class="text-gray-700">Select a time</label>
                    </div>
                    <span class="text-white top-4 mx-1.5 relative">TO</span>
                    <div class="timepicker relative form-floating mb-3 xl:w-48"
                         data-mdb-with-icon="false" id="input-toggle-timepicker">
                        <input type="text" wire:model.defer="OpeningHours.tuesdayPMEnd"
                               class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                               placeholder="Select a date"
                               data-mdb-toggle="input-toggle-timepicker"/>
                        <label for="floatingInput" class="text-gray-700">Select a time</label>
                    </div>
                </div>
                <div class="flex justify-start hidden" id="tuesdayPMClosed">
                    <span class="text-xl text-red-500 font-bold">Closed</span>
                </div>
            </div>
        </div>
        <div class="p-4 bg-gray-50 flex flex-row rounded-lg dark:bg-gray-800" id="wednesday" role="tabpanel"
             aria-labelledby="wednesday-tab">
            <div>
                <label for="default-toggle"
                       class="inline-flex relative items-center cursor-pointer">
                    <span class="ml-3 text-xl font-bold text-gray-900 dark:text-blue-500">Wednesday AM</span>
                </label>
                <x-jet-button id="wednesdayAM" onclick="hideShow('wednesdayAM','wednesdayAMSelection','wednesdayAMClosed')"
                              class="bg-indigo-500 ml-4 mb-2 dark:text-blue-100">Open / Close
                </x-jet-button>
                <div class="flex justify-start" id="wednesdayAMSelection">
                    <div class="timepicker relative form-floating mb-3 xl:w-48"
                         data-mdb-with-icon="false" id="input-toggle-timepicker">
                        <input type="text" wire:model.defer="OpeningHours.wednesdayAMStart"
                               class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                               placeholder="Select a date"
                               data-mdb-toggle="input-toggle-timepicker"/>
                        <label for="floatingInput" class="text-gray-700">Select a time</label>
                    </div>
                    <span class="text-white top-4 mx-1.5 relative">TO</span>
                    <div class="timepicker relative form-floating mb-3 xl:w-48"
                         data-mdb-with-icon="false" id="input-toggle-timepicker">
                        <input type="text" wire:model.defer="OpeningHours.wednesdayAMEnd"
                               class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                               placeholder="Select a date"
                               data-mdb-toggle="input-toggle-timepicker"/>
                        <label for="floatingInput" class="text-gray-700">Select a time</label>
                    </div>
                </div>
                <div class="flex justify-start hidden" id="wednesdayAMClosed">
                    <span class="text-xl text-red-500 font-bold">Closed</span>
                </div>
            </div>
            <div class="ml-auto">
                <label for="default-toggle"
                       class="inline-flex relative items-center cursor-pointer">
                    <span class="ml-3 text-xl font-bold text-gray-900 dark:text-blue-500">Wednesday PM</span>
                </label>
                <x-jet-button id="wednesdayPM" onclick="hideShow('wednesdayPM','wednesdayPMSelection','wednesdayPMClosed')"
                              class="bg-indigo-500 ml-4 mb-2 dark:text-blue-100">Open / Close
                </x-jet-button>
                <div class="flex justify-start" id="wednesdayPMSelection">
                    <div class="timepicker relative form-floating mb-3 xl:w-48"
                         data-mdb-with-icon="false" id="input-toggle-timepicker">
                        <input type="text" wire:model.defer="OpeningHours.wednesdayPMStart"
                               class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                               placeholder="Select a date"
                               data-mdb-toggle="input-toggle-timepicker"/>
                        <label for="floatingInput" class="text-gray-700">Select a time</label>
                    </div>
                    <span class="text-white top-4 mx-1.5 relative">TO</span>
                    <div class="timepicker relative form-floating mb-3 xl:w-48"
                         data-mdb-with-icon="false" id="input-toggle-timepicker">
                        <input type="text" wire:model.defer="OpeningHours.wednesdayPMEnd"
                               class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                               placeholder="Select a date"
                               data-mdb-toggle="input-toggle-timepicker"/>
                        <label for="floatingInput" class="text-gray-700">Select a time</label>
                    </div>
                </div>
                <div class="flex justify-start hidden" id="wednesdayPMClosed">
                    <span class="text-xl text-red-500 font-bold">Closed</span>
                </div>
            </div>
        </div>
        <div class="p-4 bg-gray-50 flex flex-row rounded-lg dark:bg-gray-800" id="thursday" role="tabpanel"
             aria-labelledby="thursday-tab">
            <div>
                <label for="default-toggle"
                       class="inline-flex relative items-center cursor-pointer">
                    <span class="ml-3 text-xl font-bold text-gray-900 dark:text-blue-500">Thursday AM</span>
                </label>
                <x-jet-button id="thursdayAM" onclick="hideShow('thursdayAM','thursdayAMSelection','thursdayAMClosed')"
                              class="bg-indigo-500 ml-4 mb-2 dark:text-blue-100">Open / Close
                </x-jet-button>
                <div class="flex justify-start" id="thursdayAMSelection">
                    <div class="timepicker relative form-floating mb-3 xl:w-48"
                         data-mdb-with-icon="false" id="input-toggle-timepicker">
                        <input type="text" wire:model.defer="OpeningHours.thursdayAMStart"
                               class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                               placeholder="Select a date"
                               data-mdb-toggle="input-toggle-timepicker"/>
                        <label for="floatingInput" class="text-gray-700">Select a time</label>
                    </div>
                    <span class="text-white top-4 mx-1.5 relative">TO</span>
                    <div class="timepicker relative form-floating mb-3 xl:w-48"
                         data-mdb-with-icon="false" id="input-toggle-timepicker">
                        <input type="text" wire:model.defer="OpeningHours.thursdayAMEnd"
                               class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                               placeholder="Select a date"
                               data-mdb-toggle="input-toggle-timepicker"/>
                        <label for="floatingInput" class="text-gray-700">Select a time</label>
                    </div>
                </div>
                <div class="flex justify-start hidden" id="thursdayAMClosed">
                    <span class="text-xl text-red-500 font-bold">Closed</span>
                </div>
            </div>
            <div class="ml-auto">
                <label for="default-toggle"
                       class="inline-flex relative items-center cursor-pointer">
                    <span class="ml-3 text-xl font-bold text-gray-900 dark:text-blue-500">Thursday PM</span>
                </label>
                <x-jet-button id="thursdayPM" onclick="hideShow('thursdayPM','thursdayPMSelection','thursdayPMClosed')"
                              class="bg-indigo-500 ml-4 mb-2 dark:text-blue-100">Open / Close
                </x-jet-button>
                <div class="flex justify-start" id="thursdayPMSelection">
                    <div class="timepicker relative form-floating mb-3 xl:w-48"
                         data-mdb-with-icon="false" id="input-toggle-timepicker">
                        <input type="text" wire:model.defer="OpeningHours.thursdayPMStart"
                               class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                               placeholder="Select a date"
                               data-mdb-toggle="input-toggle-timepicker"/>
                        <label for="floatingInput" class="text-gray-700">Select a time</label>
                    </div>
                    <span class="text-white top-4 mx-1.5 relative">TO</span>
                    <div class="timepicker relative form-floating mb-3 xl:w-48"
                         data-mdb-with-icon="false" id="input-toggle-timepicker">
                        <input type="text" wire:model.defer="OpeningHours.thursdayPMEnd"
                               class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                               placeholder="Select a date"
                               data-mdb-toggle="input-toggle-timepicker"/>
                        <label for="floatingInput" class="text-gray-700">Select a time</label>
                    </div>
                </div>
                <div class="flex justify-start hidden" id="thursdayPMClosed">
                    <span class="text-xl text-red-500 font-bold">Closed</span>
                </div>
            </div>
        </div>
        <div class="hidden p-4 bg-gray-50 flex flex-row rounded-lg dark:bg-gray-800" id="friday"
             role="tabpanel" aria-labelledby="friday-tab">
            <div>
                <label for="default-toggle"
                       class="inline-flex relative items-center cursor-pointer">
                    <span class="ml-3 text-xl font-bold text-gray-900 dark:text-blue-500">Friday AM</span>
                </label>
                <x-jet-button id="fridayAM" onclick="hideShow('fridayAM','fridayAMSelection','fridayAMClosed')"
                              class="bg-indigo-500 ml-4 mb-2 dark:text-blue-100">Open / Close
                </x-jet-button>
                <div class="flex justify-start" id="fridayAMSelection">
                    <div class="timepicker relative form-floating mb-3 xl:w-48"
                         data-mdb-with-icon="false" id="input-toggle-timepicker">
                        <input type="text" wire:model.defer="OpeningHours.fridayAMStart"
                               class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                               placeholder="Select a date"
                               data-mdb-toggle="input-toggle-timepicker"/>
                        <label for="floatingInput" class="text-gray-700">Select a time</label>
                    </div>
                    <span class="text-white top-4 mx-1.5 relative">TO</span>
                    <div class="timepicker relative form-floating mb-3 xl:w-48"
                         data-mdb-with-icon="false" id="input-toggle-timepicker">
                        <input type="text" wire:model.defer="OpeningHours.fridayAMEnd"
                               class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                               placeholder="Select a date"
                               data-mdb-toggle="input-toggle-timepicker"/>
                        <label for="floatingInput" class="text-gray-700">Select a time</label>
                    </div>
                </div>
                <div class="flex justify-start hidden" id="fridayAMClosed">
                    <span class="text-xl text-red-500 font-bold">Closed</span>
                </div>
            </div>
            <div class="ml-auto">
                <label for="default-toggle"
                       class="inline-flex relative items-center cursor-pointer">
                    <span class="ml-3 text-xl font-bold text-gray-900 dark:text-blue-500">Friday PM</span>
                </label>
                <x-jet-button id="fridayPM" onclick="hideShow('fridayPM','fridayPMSelection','fridayPMClosed')"
                              class="bg-indigo-500 ml-4 mb-2 dark:text-blue-100">Open / Close
                </x-jet-button>
                <div class="flex justify-start" id="fridayPMSelection">
                    <div class="timepicker relative form-floating mb-3 xl:w-48"
                         data-mdb-with-icon="false" id="input-toggle-timepicker">
                        <input type="text" wire:model.defer="OpeningHours.fridayPMStart"
                               class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                               placeholder="Select a date"
                               data-mdb-toggle="input-toggle-timepicker"/>
                        <label for="floatingInput" class="text-gray-700">Select a time</label>
                    </div>
                    <span class="text-white top-4 mx-1.5 relative">TO</span>
                    <div class="timepicker relative form-floating mb-3 xl:w-48"
                         data-mdb-with-icon="false" id="input-toggle-timepicker">
                        <input type="text" wire:model.defer="OpeningHours.fridayPMEnd"
                               class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                               placeholder="Select a date"
                               data-mdb-toggle="input-toggle-timepicker"/>
                        <label for="floatingInput" class="text-gray-700">Select a time</label>
                    </div>
                </div>
                <div class="flex justify-start hidden" id="fridayPMClosed">
                    <span class="text-xl text-red-500 font-bold">Closed</span>
                </div>
            </div>
        </div>
        <div class="hidden p-4 bg-gray-50 flex flex-row rounded-lg dark:bg-gray-800" id="saturday"
             role="tabpanel" aria-labelledby="saturday-tab">
            <div>
                <label for="default-toggle"
                       class="inline-flex relative items-center cursor-pointer">
                    <span class="ml-3 text-xl font-bold text-gray-900 dark:text-blue-500">Saturday AM</span>
                </label>
                <x-jet-button id="saturdayAM" onclick="hideShow('saturdayAM','saturdayAMSelection','saturdayAMClosed')"
                              class="bg-indigo-500 ml-4 mb-2 dark:text-blue-100">Open / Close
                </x-jet-button>
                <div class="flex justify-start" id="saturdayAMSelection">
                    <div class="timepicker relative form-floating mb-3 xl:w-48"
                         data-mdb-with-icon="false" id="input-toggle-timepicker">
                        <input type="text" wire:model.defer="OpeningHours.saturdayAMStart"
                               class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                               placeholder="Select a date"
                               data-mdb-toggle="input-toggle-timepicker"/>
                        <label for="floatingInput" class="text-gray-700">Select a time</label>
                    </div>
                    <span class="text-white top-4 mx-1.5 relative">TO</span>
                    <div class="timepicker relative form-floating mb-3 xl:w-48"
                         data-mdb-with-icon="false" id="input-toggle-timepicker">
                        <input type="text" wire:model.defer="OpeningHours.saturdayAMEnd"
                               class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                               placeholder="Select a date"
                               data-mdb-toggle="input-toggle-timepicker"/>
                        <label for="floatingInput" class="text-gray-700">Select a time</label>
                    </div>
                </div>
                <div class="flex justify-start hidden" id="saturdayAMClosed">
                    <span class="text-xl text-red-500 font-bold">Closed</span>
                </div>
            </div>
            <div class="ml-auto">
                <label for="default-toggle"
                       class="inline-flex relative items-center cursor-pointer">
                    <span class="ml-3 text-xl font-bold text-gray-900 dark:text-blue-500">Saturday PM</span>
                </label>
                <x-jet-button id="saturdayPM" onclick="hideShow('saturdayPM','saturdayPMSelection','saturdayPMClosed')"
                              class="bg-indigo-500 ml-4 mb-2 dark:text-blue-100">Open / Close
                </x-jet-button>
                <div class="flex justify-start" id="saturdayPMSelection">
                    <div class="timepicker relative form-floating mb-3 xl:w-48"
                         data-mdb-with-icon="false" id="input-toggle-timepicker">
                        <input type="text" wire:model.defer="OpeningHours.saturdayPMStart"
                               class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                               placeholder="Select a date"
                               data-mdb-toggle="input-toggle-timepicker"/>
                        <label for="floatingInput" class="text-gray-700">Select a time</label>
                    </div>
                    <span class="text-white top-4 mx-1.5 relative">TO</span>
                    <div class="timepicker relative form-floating mb-3 xl:w-48"
                         data-mdb-with-icon="false" id="input-toggle-timepicker">
                        <input type="text" wire:model.defer="OpeningHours.saturdayPMEnd"
                               class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                               placeholder="Select a date"
                               data-mdb-toggle="input-toggle-timepicker"/>
                        <label for="floatingInput" class="text-gray-700">Select a time</label>
                    </div>
                </div>
                <div class="flex justify-start hidden" id="saturdayPMClosed">
                    <span class="text-xl text-red-500 font-bold">Closed</span>
                </div>
            </div>
        </div>
        <div class="hidden p-4 bg-gray-50 flex flex-row rounded-lg dark:bg-gray-800" id="sunday"
             role="tabpanel" aria-labelledby="sunday-tab">
            <div>
                <label for="default-toggle"
                       class="inline-flex relative items-center cursor-pointer">
                    <span class="ml-3 text-xl font-bold text-gray-900 dark:text-blue-500">Sunday AM</span>
                </label>
                <x-jet-button id="sundayAM" onclick="hideShow('sundayAM','sundayAMSelection','sundayAMClosed')"
                              class="bg-indigo-500 ml-4 mb-2 dark:text-blue-100">Open / Close
                </x-jet-button>
                <div class="flex justify-start" id="sundayAMSelection">
                    <div class="timepicker relative form-floating mb-3 xl:w-48"
                         data-mdb-with-icon="false" id="input-toggle-timepicker">
                        <input type="text" wire:model.defer="OpeningHours.sundayAMStart"
                               class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                               placeholder="Select a date"
                               data-mdb-toggle="input-toggle-timepicker"/>
                        <label for="floatingInput" class="text-gray-700">Select a time</label>
                    </div>
                    <span class="text-white top-4 mx-1.5 relative">TO</span>
                    <div class="timepicker relative form-floating mb-3 xl:w-48"
                         data-mdb-with-icon="false" id="input-toggle-timepicker">
                        <input type="text" wire:model.defer="OpeningHours.sundayAMEnd"
                               class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                               placeholder="Select a date"
                               data-mdb-toggle="input-toggle-timepicker"/>
                        <label for="floatingInput" class="text-gray-700">Select a time</label>
                    </div>
                </div>
                <div class="flex justify-start hidden" id="sundayAMClosed">
                    <span class="text-xl text-red-500 font-bold">Closed</span>
                </div>
            </div>
            <div class="ml-auto">
                <label for="default-toggle"
                       class="inline-flex relative items-center cursor-pointer">
                    <span class="ml-3 text-xl font-bold text-gray-900 dark:text-blue-500">Sunday PM</span>
                </label>
                <x-jet-button id="sundayPM" onclick="hideShow('sundayPM','sundayPMSelection','sundayPMClosed')"
                              class="bg-indigo-500 ml-4 mb-2 dark:text-blue-100">Open / Close
                </x-jet-button>
                <div class="flex justify-start" id="sundayPMSelection">
                    <div class="timepicker relative form-floating mb-3 xl:w-48"
                         data-mdb-with-icon="false" id="input-toggle-timepicker">
                        <input type="text" wire:model.defer="OpeningHours.sundayPMStart"
                               class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                               placeholder="Select a date"
                               data-mdb-toggle="input-toggle-timepicker"/>
                        <label for="floatingInput" class="text-gray-700">Select a time</label>
                    </div>
                    <span class="text-white top-4 mx-1.5 relative">TO</span>
                    <div class="timepicker relative form-floating mb-3 xl:w-48"
                         data-mdb-with-icon="false" id="input-toggle-timepicker">
                        <input type="text" wire:model.defer="OpeningHours.sundayPMEnd"
                               class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                               placeholder="Select a date"
                               data-mdb-toggle="input-toggle-timepicker"/>
                        <label for="floatingInput" class="text-gray-700">Select a time</label>
                    </div>
                </div>
                <div class="flex justify-start hidden" id="sundayPMClosed">
                    <span class="text-xl text-red-500 font-bold">Closed</span>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function hideShow(hideShowBtn, contentDiv, Closed) {
        const btn = document.getElementById(hideShowBtn);
        const targetDiv = document.getElementById(contentDiv);
        const closeSpan = document.getElementById(Closed);
        btn.onclick = function () {
            if (targetDiv.style.display !== "none") {
                targetDiv.style.display = "none";
                closeSpan.style.display = 'flex';
            } else {
                closeSpan.style.display = "none";
                targetDiv.style.display = "flex";
            }
        };
    }
</script>
