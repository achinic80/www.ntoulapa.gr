

<!-- FOOTER -->
<footer class="bg-[#2d2a26] text-white py-6 text-center">



  <!-- CATEGORIES -->
<section class="py-16 px-6 max-w-6xl mx-auto">


  <div class="grid md:grid-cols-3 gap-1">
    @foreach($data['footermenuchoices'] as $footermenuchoice)
      <div class="group cursor-pointer">
        <p class="group-hover:text-[#a47551]">
          {{ $footermenuchoice['title'] }}
        </p>
      </div>
    @endforeach
  </div>
</section>


  © 2026 Ntoulapa Marketplace
</footer>
