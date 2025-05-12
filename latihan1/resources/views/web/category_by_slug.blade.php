<x-layout> 
   @if ($category)
       <h1>{{ $category->name }}</h1> 
       <hr> 
       <p>{{ $category->description }}</p>
   @else
       <h1>Kategori tidak ditemukan</h1>
       <p>Silakan kembali ke halaman sebelumnya.</p>
   @endif

   <style>
    body {
        background: linear-gradient(
            110deg,
            #0d0d0d 40%,
rgb(52, 50, 50) 50%,
            #0d0d0d 60%
        );
        background-size: 200% 200%;
        animation: shimmer 6s linear infinite;
        color:rgb(255, 255, 255);
        font-family: 'Roboto', sans-serif;
    }

    @keyframes shimmer {
        0% {
            background-position: 200% 0;
        }
        100% {
            background-position: -200% 0;
        }
    }
   </style>
   
</x-layout> 