@include('ntoulapa/f_top', ['title' => 'My Page'])

<body class="text-gray-800 font-sans">
    @include('ntoulapa/p_searchntoulapa', ['title' => 'My Page'])

    <!-- CATEGORIES -->
    <section class="py-16 px-6 max-w-6xl mx-auto">
    <h2 class="text-2xl font-semibold mb-10 text-center">Λάβαμε τα στοιχεία σας και σύντομα κάποιος εκπρόσωπος μας θα επικοινωνήσει μαζί σας.</h2>
    </section>
    
    @include('ntoulapa/p_categories', ['title' => 'My Page'])
    @include('ntoulapa/f_footer', [])
</body>
</html>