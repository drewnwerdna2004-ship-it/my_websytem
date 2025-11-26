<?php include "../../config/db_connect.php"; ?>


<!DOCTYPE html>
<html lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Student Management</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet"/>
<script>
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            "primary": "#135bec",
            "background-light": "#f6f6f8",
            "background-dark": "#101622",
          },
          fontFamily: {
            "display": ["Lexend", "sans-serif"]
          },
          borderRadius: {
            "DEFAULT": "0.25rem",
            "lg": "0.5rem",
            "xl": "0.75rem",
            "full": "9999px"
          },
        },
      },
    }

     fetch('get_users.php')
      .then(response => response.json())
      .then(data => {
        const tbody = document.getElementById('tableBody');
        tbody.innerHTML = '';
        data.forEach(user => {
          const row = document.createElement('tr');
          row.className = 'hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors';
          row.innerHTML = `
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900 dark:text-slate-100">${user.id}</td>
            <td class="px-6 py-4 whitespace-nowrap">
              <div class="flex items-center">
                <div class="flex-shrink-0 h-10 w-10 rounded-full bg-primary/10 flex items-center justify-center text-primary font-medium">
                  ${user.name.charAt(0).toUpperCase()}
                </div>
                <div class="ml-4">
                  <div class="text-sm font-medium text-slate-900 dark:text-white">${user.name}</div>
                </div>
              </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600 dark:text-slate-300">${user.course}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600 dark:text-slate-300">${user.status}</td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              <button class="text-primary hover:text-primary/80 mr-3">
                <span class="material-symbols-outlined text-lg">edit</span>
              </button>
              <button class="text-red-600 hover:text-red-800" onclick="deleteUser(${user.id})">
                <span class="material-symbols-outlined text-lg">delete</span>
              </button>
            </td>
          `;
          tbody.appendChild(row);
        });
      })
      .catch(err => console.error(err));

      function deleteUser(id) {
        if (!confirm("Are you sure you want to delete this user?")) {
          return;
        }
        
        // Show loading state
        const deleteBtn = event.target.closest('button');
        const originalHTML = deleteBtn.innerHTML;
        deleteBtn.disabled = true;
        deleteBtn.innerHTML = '<span class="material-symbols-outlined animate-spin">refresh</span>';
        
        fetch('delete_user.php', {
          method: 'POST',
          headers: { 
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-Requested-With': 'XMLHttpRequest'
          },
          body: `id=${encodeURIComponent(id)}`
        })
        .then(response => {
          if (!response.ok) {
            throw new Error('Network response was not ok');
          }
          return response.json();
        })
        .then(data => {
          if (data.success) {
            // Remove the row from the table without reloading the page
            const row = deleteBtn.closest('tr');
            row.style.opacity = '0';
            setTimeout(() => row.remove(), 300);
            
            // Show success message
            showNotification('User deleted successfully', 'success');
          } else {
            throw new Error(data.error || 'Failed to delete user');
          }
        })
        .catch(error => {
          console.error('Error:', error);
          showNotification(error.message || 'An error occurred while deleting the user', 'error');
        })
        .finally(() => {
          // Reset button state
          deleteBtn.disabled = false;
          deleteBtn.innerHTML = originalHTML;
        });
      }
      
      function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 px-6 py-3 rounded-lg shadow-lg text-white ${
          type === 'success' ? 'bg-green-500' : 'bg-red-500'
        }`;
        notification.textContent = message;
        document.body.appendChild(notification);
        
        // Auto remove after 3 seconds
        setTimeout(() => {
          notification.style.opacity = '0';
          notification.style.transition = 'opacity 0.5s';
          setTimeout(() => notification.remove(), 500);
        }, 3000);
      }
</script>

<style>
    .material-symbols-outlined {
      font-variation-settings:
        'FILL' 0,
        'wght' 400,
        'GRAD' 0,
        'opsz' 24
    }
    .material-symbols-outlined.fill {
      font-variation-settings: 'FILL' 1;
    }
  </style>
</head>
<body class="bg-background-light dark:bg-background-dark font-display">
<div class="flex h-screen">
 <aside class="flex h-full w-64 flex-col justify-between border-r border-slate-200 dark:border-slate-800 bg-white dark:bg-background-dark p-4 shrink-0">
                <div class="flex flex-col gap-8">
                    <!-- Logo -->
                    <div class="flex items-center gap-3 px-3 py-2 text-primary">
                        <span class="material-symbols-outlined text-3xl">school</span>
                        <h2 class="text-primary text-lg font-bold leading-tight tracking-[-0.015em]">School System</h2>
                    </div>
                    
                    <!-- User Profile -->
                    <div class="flex gap-3 items-center">
                        <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" 
                             data-alt="User avatar" 
                             style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDyuqGAsnfaAU8exRdfhsyeC6TZ_oC0TshOPJ559VgoRH4RUQhpBNr13iR50RkJOBWhFgcbE30QhhFBgS3UJNdUbyFqc6moAw8dBFtGs571pJ3do6PZmVzquofbHYfpRyexo6qBuTC1XdGR51l0bEsUJVNJ03Ltptfn4wRLXPUlZjtdm7HVmIFLwMSGN9yuLZ0ZWBQnLugRbLx-cecAqm-2nxF_hItRYzW4qN6Xso_CMXrLR7zfq2-uSQBfi4QmE0RC8SE13jiesg");'>
                        </div>
                        <div class="flex flex-col">
                            <h1 class="text-slate-900 dark:text-slate-200 text-base font-medium leading-normal">John Doe</h1>
                            <p class="text-slate-500 dark:text-slate-400 text-sm font-normal leading-normal">Registrar</p>
                        </div>
                    </div>

                    <!-- Navigation Links -->
                    <nav class="flex flex-col gap-2">
                        <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 hover:text-primary text-slate-700 dark:text-slate-300" 
                           href="../registrar_dashboard.php">
                            <span class="material-symbols-outlined">dashboard</span>
                            <p class="text-sm font-medium leading-normal">Dashboard</p>
                        </a>
                        <a class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/10 text-primary" href="student_management.php">
                            <span class="material-symbols-outlined">group</span>
                            <p class="text-sm font-medium leading-normal">Student Management</p>
                        </a>
                        <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 hover:text-primary text-slate-700 dark:text-slate-300" 
                           href="../courses/course_management.php">
                            <span class="material-symbols-outlined">book</span>
                            <p class="text-sm font-medium leading-normal">Course Management</p>
                        </a>
                        <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 hover:text-primary text-slate-700 dark:text-slate-300" 
                           href="../enrollment/enrollment.php">
                            <span class="material-symbols-outlined">how_to_reg</span>
                            <p class="text-sm font-medium leading-normal">Enrollment</p>
                        </a>
                         <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 hover:text-primary text-slate-700 dark:text-slate-300" 
                           href="#">
                            <span class="material-symbols-outlined">assessment</span>
                            <p class="text-sm font-medium leading-normal">Reports</p>
                        </a>                     
                    </nav>
                 </div>

                <!-- Sidebar Footer Actions -->
                <div class="flex flex-col gap-2">
                    <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 hover:text-primary text-slate-700 dark:text-slate-300" 
                       href="#">
                        <span class="material-symbols-outlined">settings</span>
                        <p class="text-sm font-medium leading-normal">Settings</p>
                    </a>
                    <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-red-500/10 hover:text-red-500 text-slate-700 dark:text-slate-300" 
                       href="#">
                        <span class="material-symbols-outlined">logout</span>
                        <p class="text-sm font-medium leading-normal">Logout</p>
                    </a>
                </div>
            </aside>
              <div class="flex flex-1 flex-col overflow-y-auto">
                <!-- Top Navigation Bar -->
                <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-slate-200 dark:border-slate-800 px-8 py-3 bg-white dark:bg-background-dark sticky top-0 z-10">
                    <!-- User Actions -->
                    <div class="flex flex-1 justify-end gap-4 items-center">
                        <button class="relative flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 w-10 bg-slate-100 dark:bg-slate-800/50 text-slate-700 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-700">
                            <span class="material-symbols-outlined">notifications</span>
                            <div class="absolute top-2 right-2 size-2.5 rounded-full bg-red-500 border-2 border-white dark:border-background-dark"></div>
                        </button>
                        <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" 
                             data-alt="User avatar" 
                             style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuA_w1sw-sMySQs3Vk-VH1hJHRuUWXXPMdBz2tV6qWAkzzt3CsMFytQpf344cgqXxXU4_K3Jyh_iYzVNRrE4BbH4zotUGfDHZ1FdrhRmm5JXtPSwYDwyELEpPMa8bczn1ZetNJFze4MxsM07YONXmdejvNZGlAeBtG3QaBjXNVYlo23X2VZ7eTyGxoC833IC0tLTjsHJNHvY8boR1KW6pEJQYbNlXuIfwyC5L-8LWoW4GP0QPLE2TrMYtNGlq5JaxpCb866RTN-itw");'>
                        </div>
                    </div>
                </header>

<main class="flex-1 p-8 overflow-y-auto">
<div class="p-6 bg-white rounded-lg shadow-md">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Student Management</h2>
            <p class="text-sm text-gray-500 mt-1">Manage all student records in the system</p>
        </div>
        <a href="add.php" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Add New Student
        </a>
    </div>

    <!-- Search and Filter -->
    <div class="mb-4 flex flex-col sm:flex-row gap-3">
        <div class="relative flex-grow">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                </svg>
            </div>
            <input type="text" id="searchInput" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Search students...">
        </div>
        <select class="block w-full sm:w-48 px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-sm">
            <option>All Courses</option>
            <option>Computer Science</option>
            <option>Engineering</option>
            <option>Business</option>
        </select>
    </div>

    <!-- Students Table -->
    <div class="overflow-x-auto bg-white rounded-lg border border-gray-200">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Student ID
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Student Name
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Course
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200" id="studentTableBody">
                <?php
                $query = $conn->query("
                    SELECT s.*, c.course_name, c.course_code
                    FROM students s
                    LEFT JOIN courses c ON s.course_id = c.course_id
                    ORDER BY s.student_id DESC
                ");
                while($student = $query->fetch_assoc()):
                    $full_name = $student['first_name'] 
                               . ($student['middle_name'] ? ' ' . $student['middle_name'] : '') 
                               . ' ' . $student['last_name'];
                    $enrollment_status = $student['status'] ?? 'Not Enrolled'; // Get status from database or default to 'Not Enrolled'
                ?>
                <tr class="hover:bg-gray-50 transition-colors duration-150">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        <?= htmlspecialchars($student['student_number']); ?>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900"><?= htmlspecialchars($full_name); ?></div>
                        <div class="text-sm text-gray-500"><?= htmlspecialchars($student['email']); ?></div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900"><?= htmlspecialchars($student['course_code']); ?></div>
                        <div class="text-xs text-gray-500"><?= htmlspecialchars($student['course_name']); ?></div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2.5 py-0.5 inline-flex text-xs leading-5 font-semibold rounded-full 
                            <?= in_array(strtolower($enrollment_status), ['active', 'enrolled']) ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800'; ?>">
                            <?= htmlspecialchars($enrollment_status); ?>
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex items-center justify-end space-x-2">
                            <a href="view.php?id=<?= $student['student_id']; ?>" 
                               class="text-blue-600 hover:text-blue-900 hover:bg-blue-50 p-1.5 rounded transition-colors duration-150"
                               title="View">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </a>
                            <a href="edit_student.php?id=<?= $student['student_id']; ?>" 
                               class="text-yellow-600 hover:text-yellow-900 hover:bg-yellow-50 p-1.5 rounded transition-colors duration-150"
                               title="Edit">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                            <a href="delete_user.php?id=<?= $student['student_id']; ?>" 
                               class="text-red-600 hover:text-red-900 hover:bg-red-50 p-1.5 rounded transition-colors duration-150"
                               title="Delete"
                               onclick="return confirm('Are you sure you want to delete this student?')">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-4 flex flex-col sm:flex-row items-center justify-between">
        <div class="text-sm text-gray-500 mb-4 sm:mb-0">
            Showing <span class="font-medium">1</span> to <span class="font-medium">10</span> of <span class="font-medium">20</span> results
        </div>
        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                <span class="sr-only">Previous</span>
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
            </a>
            <a href="#" aria-current="page" class="z-10 bg-blue-50 border-blue-500 text-blue-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium"> 1 </a>
            <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium"> 2 </a>
            <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium"> 3 </a>
            <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                <span class="sr-only">Next</span>
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
            </a>
        </nav>
    </div>
</div>

<!-- Search Functionality -->
<script>
document.getElementById('searchInput').addEventListener('input', function() {
    const searchValue = this.value.toLowerCase();
    const rows = document.querySelectorAll('#studentTableBody tr');
    
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(searchValue) ? '' : 'none';
    });
});
</script>
</main>
</div>
</body></html>