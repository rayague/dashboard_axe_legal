<p>Nouvelle demande de consultation :</p>
<ul>
    <li><strong>Nom:</strong> {{ $data['name'] }}</li>
    <li><strong>Email:</strong> {{ $data['email'] }}</li>
    <li><strong>Téléphone:</strong> {{ $data['phone'] ?? '-' }}</li>
    <li><strong>Sujet:</strong> {{ $data['subject'] ?? '-' }}</li>
    <li><strong>Message:</strong><br>{{ nl2br(e($data['message'] ?? '')) }}</li>
    <li><strong>Planifié pour:</strong> {{ $data['scheduled_at'] ?? '-' }}</li>
</ul>
