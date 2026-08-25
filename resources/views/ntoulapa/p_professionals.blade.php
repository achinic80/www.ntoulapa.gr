
<!-- PROFESSIONALS -->
<section class="py-16 px-6 bg-[#ebe6df]">
  <h2 class="text-2xl font-semibold mb-10 text-center">Επαγγελματίες</h2>
  <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
    @foreach($data['workers'] as $worker)
        <div class="bg-white p-6 rounded-2xl text-center shadow-sm">
          <img src="{{ $worker['image'] }}"
            class="w-20 h-20 mx-auto rounded-full mb-3">
          <h3 class="font-semibold">{{ $worker['eponimia'] }}</h3>
          <p class="text-sm text-gray-500">{{ $worker['perioxi'] }} • ⭐ {{ $worker['rank'] }}</p>
        </div>
    @endforeach
  </div>
</section>