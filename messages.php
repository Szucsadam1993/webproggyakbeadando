<section class="my-8">
    <h2 class="text-2xl font-bold mb-4 text-pink-500">Üzenetek</h2>
    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border p-2">Név</th>
                <th class="border p-2">Email</th>
                <th class="border p-2">Üzenet</th>
                <th class="border p-2">Küldő</th>
                <th class="border p-2">Küldés ideje</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($messages as $message): ?>
                <tr>
                    <td class="border p-2"><?= htmlspecialchars($message['name']) ?></td>
                    <td class="border p-2"><?= htmlspecialchars($message['email']) ?></td>
                    <td class="border p-2"><?= htmlspecialchars($message['message']) ?></td>
                    <td class="border p-2"><?= htmlspecialchars($message['sender']) ?></td>
                    <td class="border p-2"><?= $message['created_at'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>