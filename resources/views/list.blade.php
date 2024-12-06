<x-app-layout>
    @vite(['resources/js/main.js'])
    <div class="items-center flex flex-col">
        <h1 class="text-5xl font-serif mb-10">{{$lists->name}}</h1>
        <img src="/img/{{$lists->img_url}}" alt="" class="w-full h-80 mb-5 rounded-lg">
        <p>{{$lists->desc}}</p>
        
        <input class="mt-10 w-60" type="number" id="amount" placeholder="Enter donation amount" required>
        <button id="donateButton" type="button" class="w-48 mt-3 bg-cyan-500 hover:bg-cyan-700 rounded-md p-3 active:bg-cyan-400">Donate Here</button>
        <span id="err-label" class="text-red-500 mb-5"></span>
    </div>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-6dnCk5ijwGW3vlHr"></script>
    <input type="text" hidden value="{{$lists->slug}}" id="slug">
</x-app-layout>