<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile | Academic Portal</title>
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
            background-image: radial-gradient(rgba(0,0,0,0.06) 1px, transparent 1px);
            background-size: 14px 14px;
        }

        .tab-btn{
            position:relative;
            clip-path: polygon(10% 0, 90% 0, 100% 100%, 0% 100%);
        }

        .dossier{
            background: var(--card);
            border: 1px solid rgba(43,42,37,0.15);
            box-shadow: 0 18px 40px -20px rgba(0,0,0,0.5), 0 2px 0 rgba(255,255,255,0.4) inset;
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
            top:-20px;
            left:50%;
            transform: translateX(-50%) rotate(-3deg);
            width:30px;
            height:56px;
            filter: drop-shadow(0 3px 3px rgba(0,0,0,0.25));
        }

        .stitch{ border-top: 2px dashed rgba(43,42,37,0.25); }
        .stitch-b{ border-bottom: 2px dashed rgba(43,42,37,0.25); }

        .tab-label::before{
            content:"";
            position:absolute;
            left:0; top:0; bottom:0;
            width:3px;
            background: var(--stamp);
        }
    </style>
</head>
<body class="h-screen overflow-hidden flex flex-col">

    <!-- Top folder-tab navigation -->
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

            <a href="<?= site_url('student'); ?>" class="mb-3 font-semibold text-sm px-5 py-2.5 rounded-sm flex items-center gap-2 text-white" style="background:var(--forest);">
                <i class="fa-solid fa-arrow-left text-xs"></i> Back to Student Dashboard
            </a>
        </div>
    </header>
    <main class="flex-1 overflow-y-auto cork-texture px-8 pb-10">
        <div class="rounded-b-sm rounded-tr-sm p-8 min-h-full" style="background:var(--card); box-shadow:0 -2px 0 rgba(0,0,0,0.08) inset;">

            <p class="font-mono text-xs tracking-widest uppercase pt-6" style="color:var(--stamp);">Registrar's File &bull; Complete Record</p>
            <h2 class="font-type text-2xl mt-1 mb-8" style="color:var(--ink);">Student Profile</h2>

            <div class="max-w-4xl mx-auto relative">

                <svg class="paperclip" viewBox="0 0 34 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 14V46C9 54.2843 15.7157 61 24 61C32.2843 61 39 54.2843 39 46V10C39 4.47715 34.5228 0 29 0C23.4772 0 19 4.47715 19 10V44C19 46.7614 21.2386 49 24 49C26.7614 49 29 46.7614 29 44V16"
                          stroke="#8A8A8A" stroke-width="4" stroke-linecap="round" transform="translate(-6,0)"/>
                    <path d="M9 14V46C9 54.2843 15.7157 61 24 61C32.2843 61 39 54.2843 39 46V10C39 4.47715 34.5228 0 29 0C23.4772 0 19 4.47715 19 10V44C19 46.7614 21.2386 49 24 49C26.7614 49 29 46.7614 29 44V16"
                          stroke="#D6D6D6" stroke-width="2" stroke-linecap="round" transform="translate(-6,0)"/>
                </svg>

                <div class="dossier rounded-sm overflow-hidden">
                    <div class="p-8 pt-10 flex items-center gap-6 stitch-b">
                        <div class="w-24 h-24 rounded-full flex items-center justify-center flex-shrink-0" style="background:var(--forest);">
                            <i class="fa-regular fa-user text-4xl" style="color:var(--card);"></i>
                        </div>
                        <div class="flex-1">
                            <p class="font-mono text-[11px] uppercase tracking-[0.2em]" style="color:var(--stamp);">Student ID <?= $student_id; ?></p>
                            <h3 class="font-type text-3xl mt-1" style="color:var(--ink);"><?= $name; ?></h3>
                            <p class="font-mono text-sm mt-1" style="color:var(--ink-soft);"><?= $course; ?></p>
                        </div>
                        <div class="stamp font-type text-xs px-3 py-1 uppercase whitespace-nowrap">
                            Active
                        </div>
                    </div>

                    <div class="p-8 grid grid-cols-1 lg:grid-cols-2 gap-10">

                        <div>
                            <h4 class="font-mono text-[11px] font-bold uppercase tracking-[0.2em] mb-4 pl-3 tab-label relative" style="color:var(--ink-soft);">Academic Information</h4>
                            <ul class="space-y-3 font-mono text-sm">
                                <li class="flex justify-between items-center py-2 stitch-b">
                                    <span style="color:var(--ink-soft);">Student ID</span>
                                    <span class="font-bold" style="color:var(--ink);"><?= $student_id; ?></span>
                                </li>
                                <li class="flex justify-between items-center py-2 stitch-b">
                                    <span style="color:var(--ink-soft);">Year Level</span>
                                    <span class="font-bold" style="color:var(--ink);"><?= $year; ?></span>
                                </li>
                                <li class="flex justify-between items-center py-2 stitch-b">
                                    <span style="color:var(--ink-soft);">Course</span>
                                    <span class="font-bold" style="color:var(--ink);"><?= $course; ?></span>
                                </li>
                                <li class="flex justify-between items-center py-2">
                                    <span style="color:var(--ink-soft);">Section</span>
                                    <span class="font-bold" style="color:var(--ink);"><?= $section; ?></span>
                                </li>
                            </ul>
                        </div>

                        <div>
                            <h4 class="font-mono text-[11px] font-bold uppercase tracking-[0.2em] mb-4 pl-3 tab-label relative" style="color:var(--ink-soft);">Contact Information</h4>
                            <ul class="space-y-3 font-mono text-sm">
                                <li class="flex justify-between items-center py-2 stitch-b">
                                    <span style="color:var(--ink-soft);">Email</span>
                                    <span class="font-bold text-right" style="color:var(--ink);"><?= $email; ?></span>
                                </li>
                                <li class="flex justify-between items-center py-2 stitch-b">
                                    <span style="color:var(--ink-soft);">Contact Number</span>
                                    <span class="font-bold" style="color:var(--ink);"><?= $contact_number; ?></span>
                                </li>
                                <li class="flex justify-between items-start py-2">
                                    <span style="color:var(--ink-soft);">Address</span>
                                    <span class="font-bold text-right max-w-[220px]" style="color:var(--ink);"><?= $address; ?></span>
                                </li>
                            </ul>
                        </div>

                        <div class="lg:col-span-2 stitch pt-6">
                            <h4 class="font-mono text-[11px] font-bold uppercase tracking-[0.2em] mb-5" style="color:var(--ink-soft);">Additional Details</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="p-5 rounded-sm" style="background:rgba(47,74,60,0.07); border:1px solid rgba(47,74,60,0.15);">
                                    <div class="flex items-center gap-2 mb-2">
                                        <i class="fa-solid fa-laptop-code" style="color:var(--forest);"></i>
                                        <span class="font-type text-sm" style="color:var(--forest);">Skills</span>
                                    </div>
                                    <span class="font-mono text-sm leading-relaxed" style="color:var(--ink);"><?= $skills; ?></span>
                                </div>

                                <div class="p-5 rounded-sm" style="background:rgba(166,61,47,0.07); border:1px solid rgba(166,61,47,0.15);">
                                    <div class="flex items-center gap-2 mb-2">
                                        <i class="fa-solid fa-gamepad" style="color:var(--stamp);"></i>
                                        <span class="font-type text-sm" style="color:var(--stamp);">Hobbies</span>
                                    </div>
                                    <span class="font-mono text-sm leading-relaxed" style="color:var(--ink);"><?= $hobbies; ?></span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="px-8 pb-6 font-mono text-xs stitch pt-4" style="color:var(--ink-soft);">
                        Filed by Registrar &bull; <?= date('F j, Y'); ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>