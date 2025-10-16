<p>Nouveau message reçu depuis le formulaire de contact :</p>
<ul>
    <li><strong>Nom:</strong> {{ $data['name'] }}</li>
    <li><strong>Email:</strong> {{ $data['email'] }}</li>
    <li><strong>Téléphone:</strong> {{ $data['phone'] ?? '-' }}</li>
    <li><strong>Message:</strong><br>{{ nl2br(e($data['message'])) }}</li>
</ul>
