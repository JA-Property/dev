<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Details</title>
</head>
<body>
    <h1>Employee: <?php echo htmlspecialchars($employee->first_name . ' ' . $employee->last_name); ?></h1>
    
    <h3>Addresses</h3>
    <?php if ($employee->addresses->count()): ?>
        <ul>
            <?php foreach ($employee->addresses as $address): ?>
                <li><?php echo htmlspecialchars($address->address_line); ?>, <?php echo htmlspecialchars($address->city); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No addresses found.</p>
    <?php endif; ?>

    <h3>Phones</h3>
    <?php if ($employee->phones->count()): ?>
        <ul>
            <?php foreach ($employee->phones as $phone): ?>
                <li><?php echo htmlspecialchars($phone->number); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No phone numbers found.</p>
    <?php endif; ?>

    <h3>Emails</h3>
    <?php if ($employee->emails->count()): ?>
        <ul>
            <?php foreach ($employee->emails as $email): ?>
                <li><?php echo htmlspecialchars($email->email_address); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No emails found.</p>
    <?php endif; ?>
</body>
</html>
