

<h2>{{$name}}, nu är det dags för alfatester!</h2>

<p>Klicka på länken nedan för att aktivera din användare. </p>

{{ URL::to('activation/' . $token) }}

<p><b>Observera att länken endast funkar för ett konto. När kontot är skapat är länken inte längre giltlig.</b></p>

<p>Med Vänlig Hälsning, Johannes Nyberg - Penguin Project</p>