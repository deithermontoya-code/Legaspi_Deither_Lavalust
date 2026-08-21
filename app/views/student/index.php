<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management | Academic Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Special+Elite&family=Public+Sans:wght@400;500;600;700;800&family=Courier+Prime:wght@400;700&display=swap');

        :root{
            --kraft:#C7A574;
            --kraft-dark:#9C7B4C;
            --kraft-darker:#7C6039;
            --card:#F1EAD6;
            --ink:#2B2A25;
            --ink-soft:#6B6250;
            --stamp:#A63D2F;
            --forest:#2F4A3C;
        }
        body{ font-family:'Public Sans', sans-serif; background:var(--kraft-darker); color:var(--ink); }
        .font-type{ font-family:'Special Elite', monospace; }
        .font-mono{ font-family:'Courier Prime', monospace; }

        .cork-texture{
            background-color: var(--kraft);
            background-image:
                radial-gradient(rgba(0,0,0,0.06) 1px, transparent 1px);
            background-size: 14px 14px;
        }

        /* Folder tab navigation */
        .tab-btn{
            position:relative;
            clip-path: polygon(10% 0, 90% 0, 100% 100%, 0% 100%);
        }

        /* Index card signature element */
        .index-card{
            background: var(--card);
            background-image: repeating-linear-gradient(
                to bottom,
                transparent,
                transparent 27px,
                rgba(43,42,37,0.08) 27px,
                rgba(43,42,37,0.08) 28px
            );
            border: 1px solid rgba(43,42,37,0.15);
            box-shadow: 0 18px 40px -20px rgba(0,0,0,0.5), 0 2px 0 rgba(255,255,255,0.4) inset;
        }
        .index-card::before{
            /* red margin rule like a real index card */
            content:"";
            position:absolute;
            top:0; bottom:0; left:56px;
            width:1px;
            background: rgba(166,61,47,0.35);
        }

        .stamp{
            transform: rotate(-9deg);
            border: 3px solid var(--stamp);
            color: var(--stamp);
            border-radius: 6px;
            mix-blend-mode: multiply;
            opacity: 0.85;
        }

        .paperclip{
            position:absolute;
            top:-18px;
            left:28px;
            width:34px;
            height:64px;
            filter: drop-shadow(0 3px 3px rgba(0,0,0,0.25));
        }

        .stitch{
            border-top: 2px dashed rgba(43,42,37,0.25);
        }
    </style>
</head>
<body class="h-screen overflow-hidden flex flex-col">
    <header class="flex-shrink-0 pt-5 px-8 cork-texture">
        <div class="flex items-end justify-between">
            <div class="flex items-end gap-1">
                <div class="tab-btn font-type text-sm px-6 pt-3 pb-3" style="background:var(--forest); color:var(--card);">
                    <i class="fa-solid fa-graduation-cap mr-2"></i>LavaLust Registry
                </div>
                <a href="<?= site_url('student'); ?>" class="tab-btn font-type text-sm px-6 pt-3 pb-4 -mb-px" style="background:var(--card); color:var(--ink);">
                    Students
                </a>
                <a href="#" class="tab-btn font-type text-sm px-6 pt-3 pb-3 hover:pb-4 transition-all" style="background:rgba(241,234,214,0.55); color:var(--ink-soft);">
                    Add Student
                </a>
                <a href="#" class="tab-btn font-type text-sm px-6 pt-3 pb-3 hover:pb-4 transition-all hidden md:block" style="background:rgba(241,234,214,0.35); color:var(--ink-soft);">
                    Reports
                </a>
                <a href="#" class="tab-btn font-type text-sm px-6 pt-3 pb-3 hover:pb-4 transition-all hidden lg:block" style="background:rgba(241,234,214,0.35); color:var(--ink-soft);">
                    Transcripts
                </a>
                <a href="#" class="tab-btn font-type text-sm px-6 pt-3 pb-3 hover:pb-4 transition-all hidden lg:block" style="background:rgba(241,234,214,0.35); color:var(--ink-soft);">
                    Settings
                </a>
            </div>

            <button class="mb-3 font-semibold text-sm px-5 py-2.5 rounded-sm flex items-center gap-2 text-white" style="background:var(--stamp);">
                <i class="fa-solid fa-plus text-xs"></i> New Enrolleed
            </button>
        </div>
    </header>

    <main class="flex-1 overflow-y-auto cork-texture px-8 pb-10">
        <div class="rounded-b-sm rounded-tr-sm p-8 min-h-full" style="background:var(--card); box-shadow:0 -2px 0 rgba(0,0,0,0.08) inset;">

            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8 stitch pt-6">
                <div>
                    <p class="font-mono text-xs tracking-widest uppercase" style="color:var(--stamp);">Registrar's File &bull; S.Y. 2025&ndash;2026</p>
                    <h2 class="font-type text-2xl mt-1" style="color:var(--ink);">Student Dashboard</h2>
                </div>

                <div class="flex items-center gap-3">
                    <div class="relative">
                        <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-xs" style="color:var(--ink-soft);"></i>
                        <input type="text" placeholder="Search by name or ID&hellip;" class="bg-white/60 border pl-9 pr-3 py-2 text-sm rounded-sm outline-none w-56" style="border-color:rgba(43,42,37,0.2); color:var(--ink);">
                    </div>
                    <select class="bg-white/60 border px-3 py-2 text-sm rounded-sm outline-none" style="border-color:rgba(43,42,37,0.2); color:var(--ink);">
                        <option>All Grades</option>
                    </select>
                    <select class="bg-white/60 border px-3 py-2 text-sm rounded-sm outline-none" style="border-color:rgba(43,42,37,0.2); color:var(--ink);">
                        <option>All Status</option>
                    </select>
                </div>
            </div>

            <p class="font-mono text-xs uppercase tracking-widest mb-6" style="color:var(--ink-soft);">Showing 1 of 1 filed records</p>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                <div class="relative">

                    <svg class="paperclip" viewBox="0 0 34 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 14V46C9 54.2843 15.7157 61 24 61C32.2843 61 39 54.2843 39 46V10C39 4.47715 34.5228 0 29 0C23.4772 0 19 4.47715 19 10V44C19 46.7614 21.2386 49 24 49C26.7614 49 29 46.7614 29 44V16"
                              stroke="#8A8A8A" stroke-width="4" stroke-linecap="round" transform="translate(-6,0)"/>
                        <path d="M9 14V46C9 54.2843 15.7157 61 24 61C32.2843 61 39 54.2843 39 46V10C39 4.47715 34.5228 0 29 0C23.4772 0 19 4.47715 19 10V44C19 46.7614 21.2386 49 24 49C26.7614 49 29 46.7614 29 44V16"
                              stroke="#D6D6D6" stroke-width="2" stroke-linecap="round" transform="translate(-6,0)"/>
                    </svg>

                    <div class="index-card relative rounded-sm p-7 pt-9">

                        <div class="flex items-start justify-between mb-6">
                            <div class="pl-8">
                                <p class="font-mono text-[11px] uppercase tracking-[0.2em]" style="color:var(--stamp);">Student ID</p>
                                <p class="font-mono text-lg font-bold" style="color:var(--ink);"><?= htmlspecialchars($student['student_id']); ?></p>
                            </div>
                            <div class="stamp font-type text-xs px-3 py-1 uppercase whitespace-nowrap">
                                Enrolled
                            </div>
                        </div>

                        <div class="pl-8 mb-6">
                            <p class="font-type text-2xl leading-tight" style="color:var(--ink);"><?= htmlspecialchars($student['name']); ?></p>
                            <p class="font-mono text-sm mt-1" style="color:var(--ink-soft);"><?= htmlspecialchars($student['course']); ?> &mdash; <?= htmlspecialchars($student['year']); ?>, Section <?= htmlspecialchars($student['section']); ?></p>
                        </div>

                        <div class="pl-8 space-y-2.5 font-mono text-sm">
                            <p><span class="inline-block w-24" style="color:var(--ink-soft);">Email:</span> <?= htmlspecialchars($student['email']); ?></p>
                            <p><span class="inline-block w-24" style="color:var(--ink-soft);">Contact No:</span> <?= htmlspecialchars($student['contact_number']); ?></p>
                        </div>

                        <div class="pl-8 mt-7 pt-5 stitch">
                            <a href="<?= site_url('student/profile'); ?>" class="inline-flex items-center gap-2 font-semibold text-sm px-4 py-2 rounded-sm text-white" style="background:var(--forest);">
                                Open the profile <i class="fa-solid fa-arrow-right text-xs"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="index-card relative rounded-sm p-7 flex flex-col justify-between">
                    <div>
                        <p class="font-mono text-[11px] uppercase tracking-[0.2em] mb-4" style="color:var(--stamp);">Filing Note</p>
                        <p class="font-type text-sm leading-7" style="color:var(--ink);">
                            This folder currently holds one active record. New enrollees are filed
                            alphabetically and cross-referenced by course and section for the current
                            school year.
                        </p>
                    </div>
                    <div class="stitch pt-4 mt-6 font-mono text-xs" style="color:var(--ink-soft);">
                        Last updated by Registrar &bull; <?= date('F j, Y'); ?>
                    </div>
                </div>

            </div>
        </div>
    </main>
</body>
</html>