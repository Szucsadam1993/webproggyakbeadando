<section class="my-8">
    <h2 class="text-2xl font-bold mb-4">Üzenetek</h2>
    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-pink-200">
                <th class="border p-2">Küldő</th>
                <th class="border p-2">Név</th>
                <th class="border p-2">Email</th>
                <th class="border p-2">Üzenet</th>
                <th class="border p-2">Küldés ideje</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($messages as $message): ?>
                <tr>
                    <td class="border p-2"><?php echo htmlspecialchars($message['sender']); ?></td>
                    <td class="border p-2"><?php echo htmlspecialchars($message['name']); ?></td>
                    <td class="border p-2"><?php echo htmlspecialchars($message['email']); ?></td>
                    <td class="border p-2"><?php echo htmlspecialchars($message['message']); ?></td>
                    <td class="border p-2"><?php echo htmlspecialchars($message['created_at']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
