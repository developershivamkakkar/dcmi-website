@if(config('site.whatsapp'))
    @php
        $rawNum = preg_replace('/[^0-9]/', '', config('site.whatsapp'));
        $cleanNum = (strlen($rawNum) === 10) ? '91' . $rawNum : $rawNum;
        $siteName = config('site.name', 'DCM International School');
    @endphp
    <a href="https://api.whatsapp.com/send/?phone={{ $cleanNum }}&text={{ rawurlencode('Hello ' . $siteName) }}&type=phone_number&app_absent=0"
       class="whatsapp-button" target="_blank" rel="noopener noreferrer" title="Chat on WhatsApp">
        <i class="fab fa-whatsapp"></i> Contact Us
    </a>
@endif
