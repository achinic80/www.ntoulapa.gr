<!DOCTYPE html>
<html lang="el">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ntoulapa Marketplace</title>
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    body {
      background-color: #f5f2ed;
    }
  </style>
</head>

<body class="text-gray-800 font-sans">


    @include('ntoulapa/p_hero', ['title' => 'My Page'])


    @include('ntoulapa/p_categories', ['title' => 'My Page'])


    @include('ntoulapa/p_projects', ['title' => 'My Page'])


    @include('ntoulapa/p_gallery', ['title' => 'My Page'])


    @include('ntoulapa/p_professionals', ['title' => 'My Page'])


    @include('ntoulapa/p_form_prosfora', ['title' => 'My Page'])


    @include('ntoulapa/p_footer', [])


</body>
</html>