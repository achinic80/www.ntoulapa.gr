
<style>
/* GRID */

.products{
    display:grid;
    grid-template-columns:repeat(auto-fill,minmax(340px,1fr));
    gap:55px 35px;
}

/* CARD */

.product{
    cursor:pointer;
}

.image{
    overflow:hidden;
    background:#f5f5f5;
    aspect-ratio:4/3;
}

.image img{
    width:100%;
    height:100%;
    object-fit:cover;
    transition:.45s;
}

.product:hover img{
    transform:scale(1.05);
}

.info{
    margin-top:22px;
}

.title{
    font-size:28px;
    font-weight:300;
    letter-spacing:.4px;
    margin-bottom:18px;
}

.tags{
    display:flex;
    flex-wrap:wrap;
    gap:8px;
}

.tag{

    border:1px solid #ddd;
    border-radius:25px;

    padding:7px 15px;

    font-size:12px;
    text-transform:uppercase;
    letter-spacing:1px;

    transition:.25s;
}

.product:hover .tag{
    background:#222;
    color:white;
    border-color:#222;
}

@media(max-width:900px){

.products{
    grid-template-columns:1fr;
    gap:45px;
}

.title{
    font-size:22px;
}

}

</style>

<div class="products">

@foreach($data['products'] as $products)
    <article class="product">
        
        <div class="info">
            <h2 class="title">Modern Kitchen</h2>
            {{ $products['model'] }} • {{ $products['price1'] }}€

            <div class="tags">
                <span class="tag">Modern</span>
                <span class="tag">Minimal</span>
                <span class="tag">Wood</span>
                <span class="tag">Island</span>
            </div>
        </div>

        <div class="image">
            <img src="{{ $products['img1'] }}">
        </div>
        
    </article>
@endforeach


</div>

