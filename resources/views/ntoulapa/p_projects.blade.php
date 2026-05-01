

<!-- FEATURED PROJECTS -->
<section class="py-16 px-6 bg-[#ebe6df]">
  <div class="max-w-6xl mx-auto">
    <h2 class="text-2xl font-semibold mb-10 text-center">Επιλεγμένα έργα</h2>

    <div class="grid md:grid-cols-3 gap-8">


@foreach($data['projects'] as $project)
      <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition">
        <img src="{{ $project['image'] }}"
          class="h-56 w-full object-cover">
        <div class="p-5">
          <h3 class="font-semibold">{{ $project['perigrafi'] }}</h3>
          <p class="text-sm text-gray-500">{{ $project['perioxi'] }} • {{ $project['timi'] }}€</p>
        </div>
      </div>
@endforeach

      <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition">
        <img src="https://images.unsplash.com/photo-1616627981450-6b8b6e8c1b1b"
          class="h-56 w-full object-cover">
        <div class="p-5">
          <h3 class="font-semibold">Συρόμενη ντουλάπα με καθρέφτη</h3>
          <p class="text-sm text-gray-500">Θεσσαλονίκη • 1.300€</p>
        </div>
      </div>

      <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition">
        <img src="https://images.unsplash.com/photo-1599423300746-b62533397364"
          class="h-56 w-full object-cover">
        <div class="p-5">
          <h3 class="font-semibold">Ψευδοροφή με ambient φωτισμό</h3>
          <p class="text-sm text-gray-500">Πάτρα • 1.900€</p>
        </div>
      </div>

    </div>
  </div>
</section>
