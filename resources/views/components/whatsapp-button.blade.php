<!-- WhatsApp Floating Button -->
<div id="whatsapp-btn" class="fixed bottom-6 right-6 z-50">
    <a id="whatsapp-link" href="#" target="_blank" class="flex items-center justify-center w-16 h-16 bg-green-500 hover:bg-green-600 text-white rounded-full shadow-lg transition transform hover:scale-110">
        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.272-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.67-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.076 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421-7.403h-.004c-2.178 0-4.317.735-6.031 2.007-.897.714-1.625 1.614-2.124 2.633-.625 1.29-.945 2.661-.945 4.025 0 2.187.732 4.338 2.064 6.07.784 1.018 1.785 1.87 2.92 2.505l.15.086c1.867 1.083 3.946 1.652 6.065 1.652 2.128 0 4.207-.569 6.07-1.65l.16-.089c1.14-.634 2.14-1.485 2.924-2.504 1.33-1.73 2.062-3.88 2.062-6.07 0-2.19-.732-4.34-2.065-6.074-.784-1.02-1.785-1.87-2.92-2.506-1.868-1.082-3.948-1.65-6.067-1.65m.008 1.417c2.05 0 4.06.569 5.77 1.642 1.05.62 2.01 1.471 2.74 2.46 1.27 1.651 1.96 3.715 1.96 5.816 0 2.1-.69 4.165-1.96 5.815-.73.99-1.69 1.84-2.74 2.46-1.71.984-3.72 1.56-5.77 1.56s-4.06-.576-5.77-1.56c-1.048-.62-2.008-1.47-2.738-2.46-1.27-1.65-1.96-3.715-1.96-5.815 0-2.1.69-4.165 1.96-5.815.73-.99 1.69-1.84 2.738-2.46 1.71-.984 3.72-1.56 5.77-1.56"/>
        </svg>
    </a>
    <div id="whatsapp-tooltip" class="absolute right-20 top-3 bg-gray-800 text-white px-4 py-2 rounded-lg shadow-lg opacity-0 pointer-events-none transition-opacity whitespace-nowrap text-sm">
        <span id="tooltip-country"></span>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const whatsappBtn = document.getElementById('whatsapp-btn');
    const whatsappLink = document.getElementById('whatsapp-link');
    const tooltip = document.getElementById('whatsapp-tooltip');
    const tooltipCountry = document.getElementById('tooltip-country');

    // Get user's country (can be improved with geolocation API)
    const userCountry = localStorage.getItem('userCountry') || 'Malaysia';
    
    // Fetch WhatsApp config for the user's country
    fetch(`/api/whatsapp/config?country=${encodeURIComponent(userCountry)}`)
        .then(response => response.json())
        .then(data => {
            if (data.whatsapp_link) {
                whatsappLink.href = data.whatsapp_link;
                tooltipCountry.textContent = `Chat with us (${data.country})`;
            }
        })
        .catch(error => console.log('WhatsApp config not found'));

    // Show tooltip on hover
    whatsappBtn.addEventListener('mouseenter', function() {
        tooltip.classList.remove('opacity-0');
        tooltip.classList.add('opacity-100');
    });

    whatsappBtn.addEventListener('mouseleave', function() {
        tooltip.classList.remove('opacity-100');
        tooltip.classList.add('opacity-0');
    });
});
</script>
