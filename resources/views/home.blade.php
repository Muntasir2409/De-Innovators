<x-base-layout>

    <section id="matches" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">Aanstaande Wedstrijden</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Voeg hier wedstrijdkaarten toe -->
            </div>

            <!-- Geen wedstrijden gepland -->
            <div class="mt-8 text-center">
                <p class="text-lg text-gray-600 italic">Nog geen wedstrijden gepland.</p>
            </div>
        </div>
    </section>

    <!-- Sectie: Hoe werkt het? -->
    <section id="how-to" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">Hoe werkt het?</h2>
            <div class="flex flex-col md:flex-row items-center gap-8">
                <div class="md:w-1/2">
                    <img src="https://via.placeholder.com/400x250" alt="Gokken uitleg" class="rounded-lg shadow-md">
                </div>
                <div class="md:w-1/2">
                    <ol class="list-decimal pl-6 text-lg">
                        <li>Kies een wedstrijd uit de lijst.</li>
                        <li>Plaats je fictieve inzet.</li>
                        <li>Kijk live hoe je weddenschap verloopt.</li>
                        <li>Verdien punten en stijg in het klassement!</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
</x-base-layout>
