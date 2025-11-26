<?php include "../config/db_connect.php"; ?>

<!DOCTYPE html>
<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Cashier Portal - Payments</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
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
    </style>
</head>
<body class="font-display">
<div class="relative flex h-auto min-h-screen w-full flex-col bg-background-light dark:bg-background-dark">
<div class="flex h-full w-full">
<aside class="sticky top-0 flex h-screen min-h-[700px] w-64 flex-col justify-between border-r border-slate-200 bg-white p-4 dark:border-slate-800 dark:bg-background-dark">
<div class="flex flex-col gap-8">
<div class="flex items-center gap-3 px-3 text-primary">
<span class="material-symbols-outlined text-3xl">school</span>
<h2 class="text-xl font-bold">Cashier Portal</h2>
</div>
<nav class="flex flex-col gap-2">
<a class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800" href="#">
<span class="material-symbols-outlined">dashboard</span>
<p class="text-sm font-medium">Dashboard</p>
</a>
<a class="flex items-center gap-3 rounded-lg bg-primary/20 px-3 py-2 text-primary" href="#">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">payments</span>
<p class="text-sm font-medium">Payments</p>
</a>
<a class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800" href="#">
<span class="material-symbols-outlined">receipt_long</span>
<p class="text-sm font-medium">Billing</p>
</a>
<a class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800" href="#">
<span class="material-symbols-outlined">bar_chart</span>
<p class="text-sm font-medium">Reports</p>
</a>
</nav>
</div>
<div class="flex flex-col">
<a class="flex items-center gap-3 rounded-lg px-3 py-2 text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800" href="#">
<span class="material-symbols-outlined">logout</span>
<p class="text-sm font-medium">Logout</p>
</a>
</div>
</aside>
<div class="flex flex-1 flex-col">
<header class="sticky top-0 z-10 flex items-center justify-between whitespace-nowrap border-b border-slate-200 bg-white px-8 py-3 dark:border-slate-800 dark:bg-background-dark">
<div class="flex flex-1 items-center gap-8">
<h1 class="text-xl font-bold text-slate-900 dark:text-slate-100">All Payments</h1>
</div>
<div class="flex flex-shrink-0 items-center justify-end gap-4">
<button class="flex h-10 w-10 max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg bg-slate-100 text-slate-700 hover:bg-slate-200 dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-700">
<span class="material-symbols-outlined">settings</span>
</button>
<button class="flex h-10 w-10 max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg bg-slate-100 text-slate-700 hover:bg-slate-200 dark:bg-slate-800 dark:text-slate-300 dark:hover:bg-slate-700">
<span class="material-symbols-outlined">notifications</span>
</button>
<div class="flex items-center gap-3">
<div class="aspect-square size-10 rounded-full bg-cover bg-center bg-no-repeat" data-alt="User avatar of John Doe" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCqMCBUei4CofAlpAkj0jpQM5QgqIIHSrgZ26Uj6QzzPbR0lGnbpg8zqDKpRCcEu9RE2HupV1O3O-XA9zc088wCAhevSVIWdYFD9aMx-gG0yxBDK9rBK9JWKzy43ymCB8sJ_m832zp8BCcIxU_LSSioSZJT1LTOv1-fQLCJRKmW43lhpiQUd79Rdwkh1q1MJSeFWTWAQV3xV-3GYDlaveUgCMqlaps19PZfTQknvv2USh6kVv3MdqmLIucuy-7_uTIvbW1JhoJghQ");'></div>
<div class="flex flex-col text-left">
<h3 class="text-sm font-medium leading-tight text-slate-900 dark:text-slate-100">John Doe</h3>
<p class="text-xs font-normal leading-tight text-slate-500 dark:text-slate-400">Cashier</p>
</div>
</div>
</div>
</header>
<main class="flex-1 p-8">
<div class="mb-6 flex flex-col gap-6">
<div class="flex flex-wrap items-center justify-between gap-4">
<div class="flex flex-wrap items-center gap-4">
<label class="flex h-10 w-full max-w-sm flex-col">
<div class="flex h-full w-full flex-1 items-stretch rounded-lg">
<div class="flex items-center justify-center rounded-l-lg border-r-0 border-none bg-white pl-3 text-slate-500 dark:bg-slate-900 dark:text-slate-400">
<span class="material-symbols-outlined">search</span>
</div>
<input class="form-input h-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg rounded-l-none border-l-0 border-none bg-white px-4 pl-2 text-base font-normal leading-normal text-slate-900 placeholder:text-slate-500 focus:border-none focus:outline-0 focus:ring-0 dark:bg-slate-900 dark:text-slate-100 dark:placeholder:text-slate-400" placeholder="Search by student or ID..." value=""/>
</div>
</label>
<button class="flex h-10 min-w-0 items-center justify-center gap-2 overflow-hidden rounded-lg border border-slate-200 bg-white px-4 text-sm font-medium leading-normal text-slate-700 hover:bg-slate-100 dark:border-slate-800 dark:bg-slate-900 dark:text-slate-300 dark:hover:bg-slate-800">
<span class="material-symbols-outlined text-xl">filter_list</span>
<span>Filter</span>
</button>
</div>
<button class="flex h-10 min-w-[120px] items-center justify-center gap-2 overflow-hidden rounded-lg bg-primary px-4 text-sm font-bold leading-normal tracking-[0.015em] text-white">
<span class="material-symbols-outlined text-xl">add</span>
<span>Add New Payment</span>
</button>
</div>
</div>
<div class="overflow-hidden rounded-xl border border-slate-200 bg-white dark:border-slate-800 dark:bg-slate-900">
<div class="overflow-x-auto">
<table class="min-w-full text-left text-sm">
<thead class="border-b border-slate-200 bg-slate-50 text-slate-500 dark:border-slate-800 dark:bg-slate-900/50 dark:text-slate-400">
<tr>
<th class="p-4 font-semibold">Payment ID</th>
<th class="p-4 font-semibold">Student Name</th>
<th class="p-4 font-semibold">Date</th>
<th class="p-4 font-semibold">Amount</th>
<th class="p-4 font-semibold">Status</th>
<th class="p-4 font-semibold text-right">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-slate-200 dark:divide-slate-800">
<tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50">
<td class="p-4 text-slate-700 dark:text-slate-300">#PAY-2024-05123</td>
<td class="p-4 text-slate-700 dark:text-slate-300">Michael Scott</td>
<td class="p-4 text-slate-700 dark:text-slate-300">2024-05-21</td>
<td class="p-4 text-slate-700 dark:text-slate-300">$250.00</td>
<td class="p-4"><span class="inline-flex items-center rounded-full bg-green-100 px-2 py-1 text-xs font-medium text-green-700 dark:bg-green-900/50 dark:text-green-300">Paid</span></td>
<td class="p-4 text-right">
<div class="flex justify-end gap-2">
<button class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-500 hover:bg-slate-100 hover:text-primary dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-primary"><span class="material-symbols-outlined text-xl">visibility</span></button>
<button class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-500 hover:bg-slate-100 hover:text-primary dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-primary"><span class="material-symbols-outlined text-xl">receipt_long</span></button>
</div>
</td>
</tr>
<tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50">
<td class="p-4 text-slate-700 dark:text-slate-300">#PAY-2024-05122</td>
<td class="p-4 text-slate-700 dark:text-slate-300">Dwight Schrute</td>
<td class="p-4 text-slate-700 dark:text-slate-300">2024-05-21</td>
<td class="p-4 text-slate-700 dark:text-slate-300">$150.00</td>
<td class="p-4"><span class="inline-flex items-center rounded-full bg-yellow-100 px-2 py-1 text-xs font-medium text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-300">Pending</span></td>
<td class="p-4 text-right">
<div class="flex justify-end gap-2">
<button class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-500 hover:bg-slate-100 hover:text-primary dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-primary"><span class="material-symbols-outlined text-xl">visibility</span></button>
<button class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-500 hover:bg-slate-100 hover:text-primary dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-primary"><span class="material-symbols-outlined text-xl">receipt_long</span></button>
</div>
</td>
</tr>
<tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50">
<td class="p-4 text-slate-700 dark:text-slate-300">#PAY-2024-05121</td>
<td class="p-4 text-slate-700 dark:text-slate-300">Jim Halpert</td>
<td class="p-4 text-slate-700 dark:text-slate-300">2024-05-20</td>
<td class="p-4 text-slate-700 dark:text-slate-300">$300.00</td>
<td class="p-4"><span class="inline-flex items-center rounded-full bg-green-100 px-2 py-1 text-xs font-medium text-green-700 dark:bg-green-900/50 dark:text-green-300">Paid</span></td>
<td class="p-4 text-right">
<div class="flex justify-end gap-2">
<button class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-500 hover:bg-slate-100 hover:text-primary dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-primary"><span class="material-symbols-outlined text-xl">visibility</span></button>
<button class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-500 hover:bg-slate-100 hover:text-primary dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-primary"><span class="material-symbols-outlined text-xl">receipt_long</span></button>
</div>
</td>
</tr>
<tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50">
<td class="p-4 text-slate-700 dark:text-slate-300">#PAY-2024-05120</td>
<td class="p-4 text-slate-700 dark:text-slate-300">Pam Beesly</td>
<td class="p-4 text-slate-700 dark:text-slate-300">2024-05-19</td>
<td class="p-4 text-slate-700 dark:text-slate-300">$50.00</td>
<td class="p-4"><span class="inline-flex items-center rounded-full bg-red-100 px-2 py-1 text-xs font-medium text-red-700 dark:bg-red-900/50 dark:text-red-300">Overdue</span></td>
<td class="p-4 text-right">
<div class="flex justify-end gap-2">
<button class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-500 hover:bg-slate-100 hover:text-primary dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-primary"><span class="material-symbols-outlined text-xl">visibility</span></button>
<button class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-500 hover:bg-slate-100 hover:text-primary dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-primary"><span class="material-symbols-outlined text-xl">receipt_long</span></button>
</div>
</td>
</tr>
<tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50">
<td class="p-4 text-slate-700 dark:text-slate-300">#PAY-2024-05119</td>
<td class="p-4 text-slate-700 dark:text-slate-300">Angela Martin</td>
<td class="p-4 text-slate-700 dark:text-slate-300">2024-05-18</td>
<td class="p-4 text-slate-700 dark:text-slate-300">$175.50</td>
<td class="p-4"><span class="inline-flex items-center rounded-full bg-green-100 px-2 py-1 text-xs font-medium text-green-700 dark:bg-green-900/50 dark:text-green-300">Paid</span></td>
<td class="p-4 text-right">
<div class="flex justify-end gap-2">
<button class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-500 hover:bg-slate-100 hover:text-primary dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-primary"><span class="material-symbols-outlined text-xl">visibility</span></button>
<button class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-500 hover:bg-slate-100 hover:text-primary dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-primary"><span class="material-symbols-outlined text-xl">receipt_long</span></button>
</div>
</td>
</tr>
<tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50">
<td class="p-4 text-slate-700 dark:text-slate-300">#PAY-2024-05118</td>
<td class="p-4 text-slate-700 dark:text-slate-300">Kevin Malone</td>
<td class="p-4 text-slate-700 dark:text-slate-300">2024-05-18</td>
<td class="p-4 text-slate-700 dark:text-slate-300">$220.00</td>
<td class="p-4"><span class="inline-flex items-center rounded-full bg-yellow-100 px-2 py-1 text-xs font-medium text-yellow-800 dark:bg-yellow-900/50 dark:text-yellow-300">Pending</span></td>
<td class="p-4 text-right">
<div class="flex justify-end gap-2">
<button class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-500 hover:bg-slate-100 hover:text-primary dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-primary"><span class="material-symbols-outlined text-xl">visibility</span></button>
<button class="flex h-8 w-8 items-center justify-center rounded-lg text-slate-500 hover:bg-slate-100 hover:text-primary dark:text-slate-400 dark:hover:bg-slate-800 dark:hover:text-primary"><span class="material-symbols-outlined text-xl">receipt_long</span></button>
</div>
</td>
</tr>
</tbody>
</table>
</div>
<div class="flex items-center justify-between border-t border-slate-200 p-4 text-sm text-slate-500 dark:border-slate-800 dark:text-slate-400">
<p>Showing 1 to 6 of 24 results</p>
<div class="flex items-center gap-1">
<button class="flex h-8 w-8 items-center justify-center rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 disabled:opacity-50" disabled=""><span class="material-symbols-outlined text-xl">chevron_left</span></button>
<button class="flex h-8 w-8 items-center justify-center rounded-lg bg-primary/20 text-primary hover:bg-primary/30">1</button>
<button class="flex h-8 w-8 items-center justify-center rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800">2</button>
<button class="flex h-8 w-8 items-center justify-center rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800">3</button>
<button class="flex h-8 w-8 items-center justify-center rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800">4</button>
<button class="flex h-8 w-8 items-center justify-center rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800"><span class="material-symbols-outlined text-xl">chevron_right</span></button>
</div>
</div>
</div>
</main>
<footer class="mt-auto border-t border-slate-200 bg-white px-8 py-4 dark:border-slate-800 dark:bg-background-dark">
<div class="flex items-center justify-between text-sm text-slate-500 dark:text-slate-400">
<p>© 2024 School Management System. All rights reserved.</p>
<div class="flex gap-4">
<a class="hover:text-primary" href="#">Help</a>
<a class="hover:text-primary" href="#">Support</a>
</div>
</div>
</footer>
</div>
</div>
</div>

</body></html>