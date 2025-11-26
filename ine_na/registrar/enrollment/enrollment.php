<?php include "../../config/db_connect.php"; ?>
<?php
// Fetch enrollment data with student and course information
$sql = "SELECT 
            e.enrollment_id,
            CONCAT(s.first_name, ' ', s.last_name) as student_name,
            c.course_name,
            e.enrollment_date,
            e.status
        FROM enrollment e
        JOIN students s ON e.student_id = s.student_id
        JOIN courses c ON e.course_id = c.course_id
        ORDER BY e.enrollment_date DESC
        LIMIT 10"; // Show only the 10 most recent enrollments

$result = $conn->query($sql);
$enrollments = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Enrollment Management - School Management System</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
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
  </script>
<style>
    .material-symbols-outlined {
      font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }
    .material-symbols-outlined.fill {
      font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    }
  </style>
</head>
<body class="font-display">
<div class="relative flex h-screen min-h-screen w-full flex-col bg-background-light dark:bg-background-dark group/design-root overflow-hidden">
<div class="flex h-full w-full">
<aside class="flex h-full w-64 flex-col justify-between border-r border-slate-200 dark:border-slate-800 bg-white dark:bg-background-dark p-4 shrink-0">
<div class="flex flex-col gap-8">
<div class="flex items-center gap-3 px-3 py-2 text-primary">
<span class="material-symbols-outlined text-3xl">school</span>
<h2 class="text-primary text-lg font-bold leading-tight tracking-[-0.015em]">School System</h2>
</div>
<div class="flex gap-3 items-center">
<div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="User avatar" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDyuqGAsnfaAU8exRdfhsyeC6TZ_oC0TshOPJ559VgoRH4RUQhpBNr13iR50RkJOBWhFgcbE30QhhFBgS3UJNdUbyFqc6moAw8dBFtGs571pJ3do6PZmVzquofbHYfpRyexo6qBuTC1XdGR51l0bEsUJVNJ03Ltptfn4wRLXPUlZjtdm7HVmIFLwMSGN9yuLZ0ZWBQnLugRbLx-cecAqm-2nxF_hItRYzW4qN6Xso_CMXrLR7zfq2-uSQBfi4QmE0RC8SE13jiesg");'></div>
<div class="flex flex-col">
<h1 class="text-slate-900 dark:text-slate-200 text-base font-medium leading-normal">John Doe</h1>
<p class="text-slate-500 dark:text-slate-400 text-sm font-normal leading-normal">Registrar</p>
</div>
</div>
<nav class="flex flex-col gap-2">
<a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 hover:text-primary text-slate-700 dark:text-slate-300" 
                           href="../registrar_dashboard.php">
                            <span class="material-symbols-outlined fill">dashboard</span>
                            <p class="text-sm font-medium leading-normal">Dashboard</p>
                        </a>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 hover:text-primary text-slate-700 dark:text-slate-300" href="../student/student_management.php">
<span class="material-symbols-outlined">group</span>
<p class="text-sm font-medium leading-normal">Student Management</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 hover:text-primary text-slate-700 dark:text-slate-300" href="../courses/course_management.php">
<span class="material-symbols-outlined">book</span>
<p class="text-sm font-medium leading-normal">Course Management</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/10 text-primary" href="#">
<span class="material-symbols-outlined fill">how_to_reg</span>
<p class="text-sm font-medium leading-normal">Enrollment</p>
</a>
 <a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 hover:text-primary text-slate-700 dark:text-slate-300" 
                           href="#">
                            <span class="material-symbols-outlined">assessment</span>
                            <p class="text-sm font-medium leading-normal">Reports</p>
                        </a>
</nav>
</div>
<div class="flex flex-col gap-2">
<a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-primary/10 hover:text-primary text-slate-700 dark:text-slate-300" href="#">
<span class="material-symbols-outlined">settings</span>
<p class="text-sm font-medium leading-normal">Settings</p>
</a>
<a class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-red-500/10 hover:text-red-500 text-slate-700 dark:text-slate-300" href="#">
<span class="material-symbols-outlined">logout</span>
<p class="text-sm font-medium leading-normal">Logout</p>
</a>
</div>
</aside>
<div class="flex flex-1 flex-col overflow-y-auto">
<header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-slate-200 dark:border-slate-800 px-8 py-3 bg-white dark:bg-background-dark sticky top-0 z-10">
<div class="flex items-center gap-8">
</div>
<div class="flex flex-1 justify-end gap-4 items-center">
<button class="relative flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 w-10 bg-slate-100 dark:bg-slate-800/50 text-slate-700 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-slate-700">
<span class="material-symbols-outlined">notifications</span>
<div class="absolute top-2 right-2 size-2.5 rounded-full bg-red-500 border-2 border-white dark:border-background-dark"></div>
</button>
<div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10" data-alt="User avatar" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuA_w1sw-sMySQs3Vk-VH1hJHRuUWXXPMdBz2tV6qWAkzzt3CsMFytQpf344cgqXxXU4_K3Jyh_iYzVNRrE4BbH4zotUGfDHZ1FdrhRmm5JXtPSwYDwyELEpPMa8bczn1ZetNJFze4MxsM07YONXmdejvNZGlAeBtG3QaBjXNVYlo23X2VZ7eTyGxoC833IC0tLTjsHJNHvY8boR1KW6pEJQYbNlXuIfwyC5L-8LWoW4GP0QPLE2TrMYtNGlq5JaxpCb866RTN-itw");'></div>
</div>
</header>
<main class="flex-1 p-8 bg-background-light dark:bg-background-dark">
<div class="flex flex-col max-w-7xl mx-auto gap-6">
<div class="flex flex-wrap gap-2">
<a class="text-slate-500 dark:text-slate-400 text-sm font-medium leading-normal" href="#">Home</a>
<span class="text-slate-500 dark:text-slate-400 text-sm font-medium leading-normal">/</span>
<span class="text-slate-900 dark:text-slate-200 text-sm font-medium leading-normal">Enrollments</span>
</div>
<div class="flex flex-wrap justify-between gap-4 items-center">
    <h1 class="text-slate-900 dark:text-slate-200 text-4xl font-black leading-tight tracking-[-0.033em] min-w-72">Enrollment Management</h1>
    <a href="enroll_student.php" class="flex min-w-[84px] max-w-[480px] items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-primary text-white text-sm font-bold leading-normal tracking-[0.015em] gap-2 hover:bg-primary/90">
        <span class="material-symbols-outlined text-xl">add</span>
        <span class="truncate">Enroll New Student</span>
    </a>
</div>
<div class="border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900/50 rounded-xl">
<div class="p-6 flex flex-col sm:flex-row justify-between items-center gap-4 border-b border-slate-200 dark:border-slate-800">
<div class="flex items-center gap-4 w-full sm:w-auto">
<label class="flex flex-col min-w-40 !h-10 max-w-sm w-full">
<div class="flex w-full flex-1 items-stretch rounded-lg h-full">
<div class="text-slate-500 dark:text-slate-400 flex bg-slate-100 dark:bg-slate-800/50 items-center justify-center pl-3 rounded-l-lg border-r-0">
<span class="material-symbols-outlined">search</span>
</div>
<input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-slate-900 dark:text-slate-200 focus:outline-0 focus:ring-2 focus:ring-primary/50 border-none bg-slate-100 dark:bg-slate-800/50 h-full placeholder:text-slate-500 dark:placeholder:text-slate-400 px-4 rounded-l-none border-l-0 pl-2 text-sm font-normal leading-normal" placeholder="Search enrollments..." value=""/>
</div>
</label>
<button class="flex shrink-0 max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-3 bg-slate-100 dark:bg-slate-800/50 text-slate-700 dark:text-slate-300 text-sm font-bold leading-normal tracking-[0.015em] gap-2 hover:bg-slate-200 dark:hover:bg-slate-700">
<span class="material-symbols-outlined text-xl">filter_list</span>
<span class="truncate">Filter</span>
</button>
</div>
<div class="flex items-center gap-2 w-full sm:w-auto">
<button class="flex w-full sm:w-auto min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-slate-100 dark:bg-slate-800/50 text-slate-700 dark:text-slate-300 text-sm font-bold leading-normal tracking-[0.015em] gap-2 hover:bg-slate-200 dark:hover:bg-slate-700">
<span class="material-symbols-outlined text-xl">history</span>
<span class="truncate">View History</span>
</button>
</div>
</div>

<div class="overflow-x-auto">
    <table class="w-full text-sm text-left text-slate-500 dark:text-slate-400">
        <thead class="text-xs text-slate-700 uppercase bg-slate-50 dark:bg-slate-800 dark:text-slate-300">
            <tr>
                <th class="px-6 py-3 font-semibold" scope="col">Enrollment ID</th>
                <th class="px-6 py-3 font-semibold" scope="col">Student Name</th>
                <th class="px-6 py-3 font-semibold" scope="col">Course Enrolled</th>
                <th class="px-6 py-3 font-semibold" scope="col">Enrollment Date</th>
                <th class="px-6 py-3 font-semibold" scope="col">Status</th>
                <th class="px-6 py-3 font-semibold" scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($enrollments as $enrollment): 
                // Determine status color based on status
                $statusClass = match(strtolower($enrollment['status'])) {
                    'active' => 'text-green-600 dark:text-green-400 bg-green-100 dark:bg-green-900/50',
                    'completed' => 'text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-800',
                    'pending' => 'text-yellow-600 dark:text-yellow-400 bg-yellow-100 dark:bg-yellow-900/50',
                    'dropped' => 'text-red-600 dark:text-red-400 bg-red-100 dark:bg-red-900/50',
                    default => 'text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-800'
                };
            ?>
            <tr class="bg-white dark:bg-slate-900/50 border-b dark:border-slate-800">
                <td class="px-6 py-4 font-mono text-slate-700 dark:text-slate-300">ENR-<?= str_pad($enrollment['enrollment_id'], 5, '0', STR_PAD_LEFT) ?></td>
                <th class="px-6 py-4 font-medium text-slate-900 dark:text-white whitespace-nowrap" scope="row">
                    <?= htmlspecialchars($enrollment['student_name']) ?>
                </th>
                <td class="px-6 py-4"><?= htmlspecialchars($enrollment['course_name']) ?></td>
                <td class="px-6 py-4"><?= date('Y-m-d', strtotime($enrollment['enrollment_date'])) ?></td>
                <td class="px-6 py-4">
                    <span class="text-xs font-medium px-2 py-1 rounded-full <?= $statusClass ?>">
                        <?= htmlspecialchars(ucfirst($enrollment['status'])) ?>
                    </span>
                </td>
                <td class="px-6 py-4">
                    <button class="text-primary hover:underline">View Details</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="p-4 flex justify-between items-center text-sm">
<span class="text-slate-500 dark:text-slate-400">Showing 1 to 5 of 150 entries</span>
<div class="flex items-center gap-2">
<button class="px-3 py-1.5 rounded-md text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 disabled:opacity-50" disabled="">Previous</button>
<button class="px-3 py-1.5 rounded-md bg-primary/10 text-primary">1</button>
<button class="px-3 py-1.5 rounded-md text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800">2</button>
<button class="px-3 py-1.5 rounded-md text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800">3</button>
<span class="text-slate-500 dark:text-slate-400">...</span>
<button class="px-3 py-1.5 rounded-md text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800">30</button>
<button class="px-3 py-1.5 rounded-md text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800">Next</button>
</div>
</div>
</div>
</div>
</main>
<footer class="px-8 py-4 border-t border-slate-200 dark:border-slate-800 bg-white dark:bg-background-dark">
<div class="flex justify-between items-center text-sm text-slate-500 dark:text-slate-400">
<p>© 2024 School Management System. All Rights Reserved.</p>
<div class="flex gap-4">
<a class="hover:text-primary" href="#">Help</a>
<a class="hover:text-primary" href="#">Privacy Policy</a>
</div>
</div>
</footer>
</div>
</div>
</div>

</body></html>