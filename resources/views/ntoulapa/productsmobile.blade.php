<!DOCTYPE html>
<html lang="el">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Αποτελέσματα Αναζήτησης</title>
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    body {
      background: #f5f2ed;
    }
  </style>
</head>

<body class="font-sans text-gray-800">

<!-- HEADER -->
<header class="bg-white shadow-sm p-4">
  <div class="max-w-7xl mx-auto flex justify-between items-center">
    <h1 class="text-xl font-semibold text-[#a47551]">Ntoulapa Marketplace</h1>

    <div class="flex gap-3">
      <input placeholder="Τι ψάχνετε"
             class="border p-2 rounded-lg w-60">

      <input placeholder="Περιοχή"
             class="border p-2 rounded-lg w-40">

      <button class="bg-[#a47551] text-white px-5 rounded-lg">
        Αναζήτηση
      </button>
    </div>
  </div>
</header>



      <div class="bg-white rounded-1x1 overflow-hidden shadow-sm">
          @include('ntoulapa/p_products', ['title' => 'My Page'])
      </div>

<!-- MAIN LAYOUT -->
<section class="max-w-7xl mx-auto py-10 px-4">



    <!-- LEFT SIDEBAR -->
    <aside class="col-span-3 bg-white p-6 rounded-2xl shadow-sm h-fit">
      <h2 class="font-semibold mb-4 text-lg">Φίλτρα</h2>
      <div class="mb-6">
        <h3 class="font-medium mb-2">Κατηγορίες</h3>
        <div class="space-y-2">
          <label class="flex gap-2">
            <input type="checkbox"> Ντουλάπες
          </label>
          <label class="flex gap-2">
            <input type="checkbox"> Κουζίνες
          </label>
          <label class="flex gap-2">
            <input type="checkbox"> Γυψοσανίδες
          </label>
        </div>
      </div>
      <div class="mb-6">
        <h3 class="font-medium mb-2">Budget</h3>
        <input type="range" class="w-full">
      </div>
      <div>
        <h3 class="font-medium mb-2">Αξιολόγηση</h3>
        <select class="border p-2 rounded w-full">
          <option>Όλα</option>
          <option>4+ αστέρια</option>
          <option>4.5+ αστέρια</option>
        </select>
      </div>
    </aside>







    <!-- MIDDLE RESULTS -->
    <main class="col-span-6 space-y-6">
      

    </main>


    <!-- RIGHT SECTION -->
    <aside class="col-span-3 space-y-6">
      <!-- TOP PROFESSIONAL -->
      <div class="bg-white p-6 rounded-2xl shadow-sm text-center">
        <img src="https://randomuser.me/api/portraits/men/22.jpg"
             class="w-20 h-20 rounded-full mx-auto mb-3">
        <h3 class="font-semibold">
          Ξυλουργείο Παπαδόπουλος
        </h3>
        <p class="text-sm text-gray-500 mb-3">
          Αθήνα • ⭐ 4.9
        </p>
        <button class="bg-[#a47551] text-white px-4 py-2 rounded-lg">
          Επικοινωνία
        </button>
      </div>


      <!-- QUICK LEAD -->
      <div class="bg-[#a47551] p-6 rounded-2xl text-white">
        <h3 class="font-semibold mb-4">
          Δεν βρήκες αυτό που ψάχνεις;
        </h3>
        <p class="text-sm mb-4">
          Στείλε αίτημα και θα λάβεις προσφορές.
        </p>
        <button class="bg-black w-full py-2 rounded-lg">
          Ζήτησε Προσφορά
        </button>
      </div>
    </aside>
  </div>
</section>

</body>
</html>