
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



    <div class="group cursor-pointer">
      <img src="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6"
        class="rounded-2xl h-72 w-full object-cover">
      <h3 class="mt-4 text-lg font-semibold group-hover:text-[#a47551]">Ντουλάπες</h3>
    </div>

    <div class="group cursor-pointer">
      <img src="https://images.unsplash.com/photo-1600585154526-990dced4db0d"
        class="rounded-2xl h-72 w-full object-cover">
      <h3 class="mt-4 text-lg font-semibold group-hover:text-[#a47551]">Κουζίνες</h3>
    </div>

    <div class="group cursor-pointer">
      <img src="https://images.unsplash.com/photo-1599423300746-b62533397364"
        class="rounded-2xl h-72 w-full object-cover">
      <h3 class="mt-4 text-lg font-semibold group-hover:text-[#a47551]">Γυψοσανίδες</h3>
    </div>

  </div>
</section>

