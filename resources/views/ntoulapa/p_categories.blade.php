
<!-- CATEGORIES -->
<section class="py-16 px-6 max-w-6xl mx-auto">
  <h2 class="text-2xl font-semibold mb-10 text-center">Κατηγορίες έργων</h2>

  <div class="grid md:grid-cols-3 gap-8">
    @foreach($data['categories'] as $category)
      <div class="group cursor-pointer">
        <img src="{{ $category['image'] }}"
          class="rounded-2xl h-72 w-full object-cover">
        <h3 class="mt-4 text-lg font-semibold group-hover:text-[#a47551]">
          {{ $category['title'] }}
        </h3>
      </div>
    @endforeach
  </div>
</section>

