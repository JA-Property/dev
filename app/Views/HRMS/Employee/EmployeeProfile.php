<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Employee Details</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 p-6">
  <div class="max-w-4xl mx-auto bg-white shadow rounded p-6">
    <h1 class="text-3xl font-bold mb-4">Employee: <?php echo htmlspecialchars($employee->first_name . ' ' . $employee->last_name); ?></h1>
    
    <!-- Addresses -->
    <div class="mb-6">
      <h3 class="text-2xl font-semibold mb-2">Addresses</h3>
      <?php if ($employee->addresses->count()): ?>
          <ul class="list-disc pl-5">
              <?php foreach ($employee->addresses as $address): ?>
                  <li class="mb-1">
                      <?php echo htmlspecialchars($address->address_line1); ?>,
                      <?php echo htmlspecialchars($address->city); ?>,
                      <?php echo htmlspecialchars($address->state); ?>,
                      <?php echo htmlspecialchars($address->zip); ?>
                  </li>
              <?php endforeach; ?>
          </ul>
      <?php else: ?>
          <p class="text-red-500">No addresses found.</p>
      <?php endif; ?>
    </div>
    
    <!-- Phones -->
    <div class="mb-6">
      <h3 class="text-2xl font-semibold mb-2">Phones</h3>
      <?php if ($employee->phones->count()): ?>
          <ul class="list-disc pl-5">
              <?php foreach ($employee->phones as $phone): ?>
                  <li class="mb-1"><?php echo htmlspecialchars($phone->number); ?> (<?php echo htmlspecialchars($phone->phone_type); ?>)</li>
              <?php endforeach; ?>
          </ul>
      <?php else: ?>
          <p class="text-red-500">No phone numbers found.</p>
      <?php endif; ?>
    </div>
    
    <!-- Emails -->
    <div class="mb-6">
      <h3 class="text-2xl font-semibold mb-2">Emails</h3>
      <?php if ($employee->emails->count()): ?>
          <ul class="list-disc pl-5">
              <?php foreach ($employee->emails as $email): ?>
                  <li class="mb-1"><?php echo htmlspecialchars($email->email_address); ?> (<?php echo htmlspecialchars($email->email_type); ?>)</li>
              <?php endforeach; ?>
          </ul>
      <?php else: ?>
          <p class="text-red-500">No emails found.</p>
      <?php endif; ?>
    </div>
    
    <!-- Emergency Contacts -->
    <div class="mb-6">
      <h3 class="text-2xl font-semibold mb-2">Emergency Contacts</h3>
      <?php if ($employee->emergencyContacts->count()): ?>
          <ul class="list-disc pl-5">
              <?php foreach ($employee->emergencyContacts as $emergencyContact): ?>
                  <li class="mb-1">
                      <?php 
                          echo htmlspecialchars($emergencyContact->contact_name) . 
                          ' (' . htmlspecialchars($emergencyContact->relationship) . ') - ' . 
                          htmlspecialchars($emergencyContact->phone);
                      ?>
                  </li>
              <?php endforeach; ?>
          </ul>
      <?php else: ?>
          <p class="text-red-500">No emergency contacts found.</p>
      <?php endif; ?>
    </div>
    
    <!-- Employment History -->
    <div class="mb-6">
      <h3 class="text-2xl font-semibold mb-2">Employment History</h3>
      <?php if ($employee->employmentHistory->count()): ?>
          <ul class="list-disc pl-5">
              <?php foreach ($employee->employmentHistory as $history): ?>
                  <li class="mb-1">
                      <?php 
                          echo htmlspecialchars($history->job_title) . ' in ' . 
                          htmlspecialchars($history->department) . ' from ' . 
                          htmlspecialchars($history->start_date) . ' to ' . 
                          htmlspecialchars($history->end_date ?? 'Present');
                      ?>
                  </li>
              <?php endforeach; ?>
          </ul>
      <?php else: ?>
          <p class="text-red-500">No employment history found.</p>
      <?php endif; ?>
    </div>
    
    <!-- Job Assignments -->
    <div class="mb-6">
      <h3 class="text-2xl font-semibold mb-2">Job Assignments</h3>
      <?php if ($employee->jobAssignments->count()): ?>
          <ul class="list-disc pl-5">
              <?php foreach ($employee->jobAssignments as $assignment): ?>
                  <li class="mb-1">
                      <?php 
                          echo htmlspecialchars($assignment->position_title) . ' in ' . 
                          htmlspecialchars($assignment->department) . ' (Assigned on ' . 
                          htmlspecialchars($assignment->assigned_date) . ')';
                      ?>
                  </li>
              <?php endforeach; ?>
          </ul>
      <?php else: ?>
          <p class="text-red-500">No job assignments found.</p>
      <?php endif; ?>
    </div>
    
    <!-- Dependents -->
    <div class="mb-6">
      <h3 class="text-2xl font-semibold mb-2">Dependents</h3>
      <?php if ($employee->dependents->count()): ?>
          <ul class="list-disc pl-5">
              <?php foreach ($employee->dependents as $dependent): ?>
                  <li class="mb-1">
                      <?php 
                          echo htmlspecialchars($dependent->dependent_name) . ' (' . 
                          htmlspecialchars($dependent->relationship) . ')';
                      ?>
                  </li>
              <?php endforeach; ?>
          </ul>
      <?php else: ?>
          <p class="text-red-500">No dependents found.</p>
      <?php endif; ?>
    </div>
  </div>
</body>
</html>
