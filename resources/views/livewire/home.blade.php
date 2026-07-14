<div>
    {{-- NAV SPACER --}}
    <div style="height: var(--navbar-height);"></div>

    {{-- HERO --}}
    <section
        style="background: var(--color-neutral-0); border-bottom: 1px solid var(--color-neutral-200); overflow: hidden;">
        <div class="container-app" style="padding-top: 4rem; padding-bottom: 4.5rem;">
            <div style="display: grid; grid-template-columns: 1fr; gap: 3rem; align-items: center;" class="hero-grid">

                <div style="order: 1;">
                    <div
                        style="display: inline-flex; align-items: center; gap: 0.5rem; background: var(--color-primary-200); border: 1.5px solid var(--color-neutral-900); border-radius: var(--radius-full); padding: 0.3125rem 0.875rem; margin-bottom: 1.5rem;">
                        <span
                            style="width: 6px; height: 6px; background: var(--color-neutral-900); border-radius: 50%;"></span>
                        <span
                            style="font-size: 0.75rem; font-weight: 800; letter-spacing: 0.08em; text-transform: uppercase;">Pondok
                            Pesantren Al Ittihadul Mubarok &middot; Rajeg, Tangerang</span>
                    </div>

                    <h1 style="margin: 0 0 1.25rem; max-width: 620px;">
                        Menjaga hafalan Al-Quran putra-putri Anda,
                        <span class="text-highlight">setoran demi setoran</span>
                    </h1>

                    <p class="text-lead" style="max-width: 500px; margin-bottom: 2rem;">
                        GubukTahfidzATM adalah sistem digital resmi Pondok Pesantren Al Ittihadul Mubarok untuk
                        mencatat setiap setoran hafalan santri secara rapi, dan menyajikannya secara terbuka kepada
                        wali santri — kapan saja, tanpa perlu datang ke pondok.
                    </p>

                    <div style="display: flex; flex-wrap: wrap; gap: 0.75rem; align-items: center;">
                        <a href="{{ route('hafalan.index') }}" wire:navigate class="btn btn-primary btn-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8" />
                                <path d="m21 21-4.3-4.3" />
                            </svg>
                            Cek Hafalan Anak
                        </a>
                        <a href="#tentang-pondok" class="btn btn-secondary btn-lg">Tentang Pondok</a>
                    </div>

                    <div
                        style="display: flex; align-items: center; gap: 1rem; margin-top: 2.5rem; padding-top: 2rem; border-top: 1px solid var(--color-neutral-200);">
                        <div class="avatar-group">
                            <div class="avatar avatar-sm">A</div>
                            <div class="avatar avatar-sm">B</div>
                            <div class="avatar avatar-sm">F</div>
                            <div class="avatar avatar-sm">Z</div>
                        </div>
                        <div>
                            <div style="font-size: 0.875rem; font-weight: 700; color: var(--color-neutral-900);">
                                Diampu langsung oleh {{ $totalUstadz }} ustadz pondok</div>
                            <div style="font-size: 0.75rem; color: var(--color-neutral-500); font-weight: 600;">
                                setiap setoran dicatat dan diperiksa oleh pengasuh</div>
                        </div>
                    </div>
                </div>

                <div style="order: 2; position: relative;">
                    <div
                        style="
                        background: var(--color-neutral-900);
                        border-radius: var(--radius-2xl);
                        padding: 2.5rem 2rem;
                        text-align: center;
                        position: relative;
                        overflow: hidden;
                        border: 2px solid var(--color-neutral-900);
                    ">
                        <div
                            style="position: absolute; inset: 0; opacity: 0.07; background-image: radial-gradient(circle, var(--color-primary-400) 1.5px, transparent 1.5px); background-size: 24px 24px;">
                        </div>
                        <div style="position: relative; z-index: 1;">
                            <p class="font-arabic"
                                style="font-size: clamp(1.75rem, 4vw, 2.75rem); color: white; margin: 0 0 1.25rem; line-height: 2.2;">
                                وَرَتِّلِ الْقُرْآنَ تَرْتِيلًا
                            </p>
                            <div
                                style="height: 2px; background: var(--color-primary-400); width: 48px; margin: 0 auto 1rem;">
                            </div>
                            <p
                                style="font-size: 0.8125rem; color: rgba(255,255,255,0.6); font-weight: 600; letter-spacing: 0.05em; text-transform: uppercase;">
                                QS. Al-Muzzammil: 4</p>
                            <p
                                style="font-size: 0.9375rem; color: rgba(255,255,255,0.85); font-weight: 500; margin-top: 0.5rem; font-style: italic;">
                                "Dan bacalah Al-Quran dengan tartil"</p>
                        </div>
                    </div>

                    <div
                        style="position: absolute; top: -16px; right: -12px; background: var(--color-primary-400); border: 2px solid var(--color-neutral-900); border-radius: var(--radius-xl); padding: 0.75rem 1rem; box-shadow: 4px 4px 0 var(--color-neutral-900);">
                        <div
                            style="font-size: 1.25rem; font-weight: 800; color: var(--color-neutral-900); line-height: 1;">
                            {{ number_format($totalSetoran) }}</div>
                        <div
                            style="font-size: 0.6875rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; color: var(--color-neutral-700);">
                            Setoran Tercatat</div>
                    </div>

                    <div
                        style="position: absolute; bottom: -16px; left: -12px; background: white; border: 2px solid var(--color-neutral-900); border-radius: var(--radius-xl); padding: 0.75rem 1rem; box-shadow: 4px 4px 0 var(--color-neutral-900); display: flex; align-items: center; gap: 0.5rem;">
                        <div style="width: 8px; height: 8px; background: var(--color-success-500); border-radius: 50%;">
                        </div>
                        <div style="font-size: 0.8125rem; font-weight: 800; color: var(--color-neutral-900);">
                            {{ number_format($totalSantriAktif) }} Santri Aktif</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- STATS STRIP (angka riil pondok, bukan angka pemanis) --}}
    <section style="background: var(--color-neutral-900);">
        <div class="container-app" style="padding-top: 0; padding-bottom: 0;">
            <div style="display: grid; grid-template-columns: repeat(2, 1fr); border-left: 1px solid rgba(255,255,255,0.08);"
                class="stats-strip">
                <div
                    style="padding: 1.75rem 1.5rem; border-right: 1px solid rgba(255,255,255,0.08); border-bottom: 1px solid rgba(255,255,255,0.08); background: rgba(163,230,53,0.06);">
                    <div
                        style="font-size: clamp(1.5rem, 3vw, 2rem); font-weight: 800; letter-spacing: -0.03em; color: var(--color-primary-400); line-height: 1;">
                        {{ number_format($totalSantriAktif) }}</div>
                    <div
                        style="font-size: 0.8125rem; font-weight: 600; color: rgba(255,255,255,0.4); text-transform: uppercase; letter-spacing: 0.05em; margin-top: 0.375rem;">
                        Santri aktif saat ini</div>
                </div>
                <div
                    style="padding: 1.75rem 1.5rem; border-right: 1px solid rgba(255,255,255,0.08); border-bottom: 1px solid rgba(255,255,255,0.08);">
                    <div
                        style="font-size: clamp(1.5rem, 3vw, 2rem); font-weight: 800; letter-spacing: -0.03em; color: white; line-height: 1;">
                        {{ number_format($totalUstadz) }}</div>
                    <div
                        style="font-size: 0.8125rem; font-weight: 600; color: rgba(255,255,255,0.4); text-transform: uppercase; letter-spacing: 0.05em; margin-top: 0.375rem;">
                        Ustadz pengampu setoran</div>
                </div>
                <div style="padding: 1.75rem 1.5rem; border-right: 1px solid rgba(255,255,255,0.08);">
                    <div
                        style="font-size: clamp(1.5rem, 3vw, 2rem); font-weight: 800; letter-spacing: -0.03em; color: white; line-height: 1;">
                        {{ number_format($totalSetoran) }}</div>
                    <div
                        style="font-size: 0.8125rem; font-weight: 600; color: rgba(255,255,255,0.4); text-transform: uppercase; letter-spacing: 0.05em; margin-top: 0.375rem;">
                        Setoran tercatat sepanjang program</div>
                </div>
                <div
                    style="padding: 1.75rem 1.5rem; border-right: 1px solid rgba(255,255,255,0.08); background: rgba(163,230,53,0.06);">
                    <div
                        style="font-size: clamp(1.5rem, 3vw, 2rem); font-weight: 800; letter-spacing: -0.03em; color: var(--color-primary-400); line-height: 1;">
                        30 Juz</div>
                    <div
                        style="font-size: 0.8125rem; font-weight: 600; color: rgba(255,255,255,0.4); text-transform: uppercase; letter-spacing: 0.05em; margin-top: 0.375rem;">
                        Target hafalan setiap santri</div>
                </div>
            </div>
        </div>
    </section>

    {{-- CARA KAMI MENJAGA TRANSPARANSI --}}
    <section
        style="background: var(--color-neutral-0); padding: 5rem 0; border-bottom: 1px solid var(--color-neutral-200);">
        <div class="container-app">
            <div style="max-width: 580px; margin-bottom: 3.5rem;">
                <p class="text-label" style="color: var(--color-primary-600); margin-bottom: 0.75rem;">Transparansi
                    Hafalan</p>
                <h2 style="margin: 0 0 1rem;">Begini cara kami menjaga hafalan santri tetap terpantau</h2>
                <p class="text-lead">GubukTahfidzATM bukan sekadar aplikasi — ini cara pondok memastikan tidak ada
                    setoran yang tercecer, dan wali santri selalu tahu perkembangan hafalan anaknya.</p>
            </div>

            <div style="display: grid; grid-template-columns: 1fr; gap: 1px; background: var(--color-neutral-200); border: 1px solid var(--color-neutral-200); border-radius: var(--radius-2xl); overflow: hidden;"
                class="feature-grid">

                <div class="feat-card"
                    style="background: white; padding: 2rem; display: flex; flex-direction: column; gap: 1rem; transition: background 0.15s;">
                    <div style="display: flex; align-items: flex-start; justify-content: space-between; gap: 1rem;">
                        <div
                            style="width: 44px; height: 44px; background: var(--color-primary-400); border-radius: var(--radius-md); border: 1.5px solid var(--color-neutral-900); display: flex; align-items: center; justify-content: center; flex-shrink: 0; color: var(--color-neutral-900);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z" />
                                <polyline points="14 2 14 8 20 8" />
                                <line x1="16" x2="8" y1="13" y2="13" />
                                <line x1="16" x2="8" y1="17" y2="17" />
                            </svg>
                        </div>
                        <span class="badge badge-neutral">Ziyadah & Murojaah</span>
                    </div>
                    <div>
                        <h4 style="margin: 0 0 0.5rem;">Setiap Setoran Dicatat Saat Itu Juga</h4>
                        <p
                            style="font-size: 0.9375rem; color: var(--color-neutral-600); line-height: 1.65; margin: 0;">
                            Begitu santri selesai membaca hafalan baru (ziyadah) atau mengulang (murojaah), ustadz
                            langsung mencatatnya — surah, ayat, dan nilai — tidak ditunda ke buku catatan manual.</p>
                    </div>
                </div>

                <div class="feat-card"
                    style="background: white; padding: 2rem; display: flex; flex-direction: column; gap: 1rem; transition: background 0.15s;">
                    <div style="display: flex; align-items: flex-start; justify-content: space-between; gap: 1rem;">
                        <div
                            style="width: 44px; height: 44px; background: var(--color-neutral-100); border-radius: var(--radius-md); border: 1.5px solid var(--color-neutral-200); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <line x1="18" x2="18" y1="20" y2="10" />
                                <line x1="12" x2="12" y1="20" y2="4" />
                                <line x1="6" x2="6" y1="20" y2="14" />
                            </svg>
                        </div>
                        <span class="badge badge-neutral">Real-time</span>
                    </div>
                    <div>
                        <h4 style="margin: 0 0 0.5rem;">Progres Juz Terlihat Tanpa Ditanya</h4>
                        <p
                            style="font-size: 0.9375rem; color: var(--color-neutral-600); line-height: 1.65; margin: 0;">
                            Total halaman dan juz yang sudah ditempuh dihitung otomatis dari catatan setoran, lalu
                            ditampilkan dalam grafik yang mudah dipahami wali santri.</p>
                    </div>
                </div>

                <div class="feat-card"
                    style="background: white; padding: 2rem; display: flex; flex-direction: column; gap: 1rem; transition: background 0.15s;">
                    <div style="display: flex; align-items: flex-start; justify-content: space-between; gap: 1rem;">
                        <div
                            style="width: 44px; height: 44px; background: var(--color-neutral-100); border-radius: var(--radius-md); border: 1.5px solid var(--color-neutral-200); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                <circle cx="9" cy="7" r="4" />
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                            </svg>
                        </div>
                        <span class="badge badge-neutral">Multi kelas</span>
                    </div>
                    <div>
                        <h4 style="margin: 0 0 0.5rem;">Santri Dikelompokkan per Kelas & Ustadz</h4>
                        <p
                            style="font-size: 0.9375rem; color: var(--color-neutral-600); line-height: 1.65; margin: 0;">
                            Setiap santri tercatat di kelas dan diampu ustadz tertentu, sehingga jelas siapa yang
                            bertanggung jawab memantau perkembangan hafalannya.</p>
                    </div>
                </div>

                <div class="feat-card"
                    style="background: white; padding: 2rem; display: flex; flex-direction: column; gap: 1rem; transition: background 0.15s;">
                    <div style="display: flex; align-items: flex-start; justify-content: space-between; gap: 1rem;">
                        <div
                            style="width: 44px; height: 44px; background: var(--color-neutral-100); border-radius: var(--radius-md); border: 1.5px solid var(--color-neutral-200); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                            </svg>
                        </div>
                        <span class="badge badge-neutral">Catatan</span>
                    </div>
                    <div>
                        <h4 style="margin: 0 0 0.5rem;">Catatan Kualitas Langsung dari Ustadz</h4>
                        <p
                            style="font-size: 0.9375rem; color: var(--color-neutral-600); line-height: 1.65; margin: 0;">
                            Bukan cuma angka — ustadz bisa menuliskan catatan tentang bacaan santri, dan wali santri
                            bisa membacanya langsung saat membuka riwayat anaknya.</p>
                    </div>
                </div>

                <div class="feat-card"
                    style="background: white; padding: 2rem; display: flex; flex-direction: column; gap: 1rem; transition: background 0.15s;">
                    <div style="display: flex; align-items: flex-start; justify-content: space-between; gap: 1rem;">
                        <div
                            style="width: 44px; height: 44px; background: var(--color-primary-400); border-radius: var(--radius-md); border: 1.5px solid var(--color-neutral-900); display: flex; align-items: center; justify-content: center; flex-shrink: 0; color: var(--color-neutral-900);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                            </svg>
                        </div>
                        <span class="badge badge-neutral">Privasi terjaga</span>
                    </div>
                    <div>
                        <h4 style="margin: 0 0 0.5rem;">Wali Santri Cukup Pakai Kode Akses</h4>
                        <p
                            style="font-size: 0.9375rem; color: var(--color-neutral-600); line-height: 1.65; margin: 0;">
                            Tidak perlu daftar akun. Kode unik yang diberikan pondok saat pendaftaran sudah cukup
                            untuk membuka seluruh riwayat setoran anak — hanya bisa diakses oleh yang punya kodenya.</p>
                    </div>
                </div>

                <div class="feat-card"
                    style="background: white; padding: 2rem; display: flex; flex-direction: column; gap: 1rem; transition: background 0.15s;">
                    <div style="display: flex; align-items: flex-start; justify-content: space-between; gap: 1rem;">
                        <div
                            style="width: 44px; height: 44px; background: var(--color-neutral-100); border-radius: var(--radius-md); border: 1.5px solid var(--color-neutral-200); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                                <polyline points="14 2 14 8 20 8" />
                            </svg>
                        </div>
                        <span class="badge badge-neutral">Export PDF</span>
                    </div>
                    <div>
                        <h4 style="margin: 0 0 0.5rem;">Laporan Bulanan yang Bisa Dicetak</h4>
                        <p
                            style="font-size: 0.9375rem; color: var(--color-neutral-600); line-height: 1.65; margin: 0;">
                            Pondok bisa mencetak laporan progres per santri atau per kelas dalam format PDF — untuk
                            arsip pondok maupun dibagikan langsung ke wali santri.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ALUR SETORAN --}}
    <section id="cara-kerja"
        style="background: var(--color-neutral-50); padding: 5rem 0; border-bottom: 1px solid var(--color-neutral-200);">
        <div class="container-app">
            <div style="max-width: 560px; margin-bottom: 3.5rem;">
                <p class="text-label" style="color: var(--color-primary-600); margin-bottom: 0.75rem;">Alur Setoran
                </p>
                <h2 style="margin: 0 0 1rem;">Dari santri membaca, sampai wali santri melihat</h2>
                <p class="text-lead">Ini urutan yang sama persis terjadi setiap hari di pondok — tidak ada langkah
                    yang disembunyikan.</p>
            </div>

            <div style="display: grid; grid-template-columns: 1fr; gap: 2rem;" class="how-grid">

                <div style="display: flex; flex-direction: column; gap: 1.25rem;">
                    <div
                        style="width: 64px; height: 64px; background: var(--color-primary-400); border: 2px solid var(--color-neutral-900); border-radius: var(--radius-full); display: flex; align-items: center; justify-content: center; font-size: 1.125rem; font-weight: 800; color: var(--color-neutral-900); box-shadow: 3px 3px 0 var(--color-neutral-900);">
                        01</div>
                    <div>
                        <h3 style="margin: 0 0 0.5rem;">Santri setor hafalan</h3>
                        <p
                            style="font-size: 1rem; color: var(--color-neutral-600); margin: 0 0 0.5rem; line-height: 1.65;">
                            Santri membaca hafalan langsung di depan ustadz, baik hafalan baru (ziyadah) maupun
                            pengulangan (murojaah).</p>
                        <p style="font-size: 0.875rem; color: var(--color-neutral-500); margin: 0;">Dilakukan sesuai
                            jadwal harian pondok, bukan hanya sesekali.</p>
                    </div>
                </div>

                <div style="display: flex; flex-direction: column; gap: 1.25rem;">
                    <div
                        style="width: 64px; height: 64px; background: var(--color-primary-400); border: 2px solid var(--color-neutral-900); border-radius: var(--radius-full); display: flex; align-items: center; justify-content: center; font-size: 1.125rem; font-weight: 800; color: var(--color-neutral-900); box-shadow: 3px 3px 0 var(--color-neutral-900);">
                        02</div>
                    <div>
                        <h3 style="margin: 0 0 0.5rem;">Ustadz mencatat di sistem</h3>
                        <p
                            style="font-size: 1rem; color: var(--color-neutral-600); margin: 0 0 0.5rem; line-height: 1.65;">
                            Ustadz yang menyimak langsung mencatat surah, rentang ayat, nilai, dan catatan tambahan
                            — tidak diwakilkan atau ditulis belakangan.</p>
                        <p style="font-size: 0.875rem; color: var(--color-neutral-500); margin: 0;">Tersimpan otomatis
                            dengan cap waktu dan nama ustadz yang menyimak.</p>
                    </div>
                </div>

                <div style="display: flex; flex-direction: column; gap: 1.25rem;">
                    <div
                        style="width: 64px; height: 64px; background: var(--color-primary-400); border: 2px solid var(--color-neutral-900); border-radius: var(--radius-full); display: flex; align-items: center; justify-content: center; font-size: 1.125rem; font-weight: 800; color: var(--color-neutral-900); box-shadow: 3px 3px 0 var(--color-neutral-900);">
                        03</div>
                    <div>
                        <h3 style="margin: 0 0 0.5rem;">Wali santri memantau langsung</h3>
                        <p
                            style="font-size: 1rem; color: var(--color-neutral-600); margin: 0 0 0.5rem; line-height: 1.65;">
                            Cukup buka GubukTahfidzATM, masukkan kode akses santri, dan seluruh riwayat hafalan anak
                            langsung terlihat.</p>
                        <p style="font-size: 0.875rem; color: var(--color-neutral-500); margin: 0;">Tidak perlu akun,
                            tidak perlu install aplikasi. Buka dari browser HP mana saja.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- CEK HAFALAN PUBLIC --}}
    <section id="cek-hafalan"
        style="background: var(--color-neutral-0); padding: 5rem 0; border-bottom: 1px solid var(--color-neutral-200);">
        <div class="container-app">
            <div style="display: grid; grid-template-columns: 1fr; gap: 3rem; align-items: center;" class="cek-grid">

                <div>
                    <p class="text-label" style="color: var(--color-primary-600); margin-bottom: 0.75rem;">Untuk Wali
                        Santri</p>
                    <h2 style="margin: 0 0 1rem;">Pantau hafalan anak tanpa perlu login</h2>
                    <p class="text-lead" style="margin-bottom: 1.5rem;">Masukkan kode akses yang diberikan pondok
                        saat pendaftaran. Anda bisa melihat seluruh riwayat setoran, progres juz, dan catatan ustadz
                        — kapan saja, dari mana saja.</p>
                    <ul
                        style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.75rem;">
                        <li
                            style="display: flex; align-items: center; gap: 0.75rem; font-size: 0.9375rem; color: var(--color-neutral-700); font-weight: 600;">
                            <span
                                style="width: 22px; height: 22px; background: var(--color-primary-400); border: 1.5px solid var(--color-neutral-900); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 6 9 17l-5-5" />
                                </svg>
                            </span>
                            Tidak perlu daftar atau login
                        </li>
                        <li
                            style="display: flex; align-items: center; gap: 0.75rem; font-size: 0.9375rem; color: var(--color-neutral-700); font-weight: 600;">
                            <span
                                style="width: 22px; height: 22px; background: var(--color-primary-400); border: 1.5px solid var(--color-neutral-900); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 6 9 17l-5-5" />
                                </svg>
                            </span>
                            Data aman — kode unik per santri
                        </li>
                        <li
                            style="display: flex; align-items: center; gap: 0.75rem; font-size: 0.9375rem; color: var(--color-neutral-700); font-weight: 600;">
                            <span
                                style="width: 22px; height: 22px; background: var(--color-primary-400); border: 1.5px solid var(--color-neutral-900); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 6 9 17l-5-5" />
                                </svg>
                            </span>
                            Lihat progres hafalan real-time
                        </li>
                        <li
                            style="display: flex; align-items: center; gap: 0.75rem; font-size: 0.9375rem; color: var(--color-neutral-700); font-weight: 600;">
                            <span
                                style="width: 22px; height: 22px; background: var(--color-primary-400); border: 1.5px solid var(--color-neutral-900); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 6 9 17l-5-5" />
                                </svg>
                            </span>
                            Baca catatan langsung dari ustadz
                        </li>
                    </ul>
                </div>

                <div
                    style="background: white; border: 2px solid var(--color-neutral-900); border-radius: var(--radius-2xl); padding: 2rem; box-shadow: 6px 6px 0 var(--color-neutral-900);">
                    <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1.5rem;">
                        <div
                            style="width: 40px; height: 40px; background: var(--color-primary-400); border: 2px solid var(--color-neutral-900); border-radius: var(--radius-md); display: flex; align-items: center; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8" />
                                <path d="m21 21-4.3-4.3" />
                            </svg>
                        </div>
                        <div>
                            <p style="font-size: 1rem; font-weight: 800; margin: 0; color: var(--color-neutral-900);">
                                Cek Hafalan Anak</p>
                            <p style="font-size: 0.8125rem; color: var(--color-neutral-500); margin: 0;">Masukkan
                                kode akses santri</p>
                        </div>
                    </div>

                    {{-- Form Pencarian Terintegrasi Livewire --}}
                    <form wire:submit="cari">
                        <div class="form-group" style="margin-bottom: 1rem;">
                            <label class="form-label">Kode Akses</label>
                            <div class="input-wrapper input-icon-left">
                                <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect width="14" height="20" x="5" y="2" rx="2" />
                                    <path d="M12 18h.01" />
                                </svg>
                                <input type="text" wire:model="kode_akses"
                                    class="form-input @error('kode_akses') error @enderror"
                                    placeholder="Contoh: HFZ-A3K9"
                                    style="text-transform: uppercase; letter-spacing: 0.1em;" autocomplete="off">
                            </div>

                            @error('kode_akses')
                                <div
                                    style="color: var(--color-danger-500, #ef4444); font-size: 0.75rem; font-weight: 600; margin-top: 0.5rem; display: flex; align-items: center; gap: 0.25rem;">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        style="width: 14px; height: 14px;">
                                        <circle cx="12" cy="12" r="10" />
                                        <line x1="12" y1="8" x2="12" y2="12" />
                                        <line x1="12" y1="16" x2="12.01" y2="16" />
                                    </svg>
                                    {{ $message }}
                                </div>
                            @else
                                <p class="form-hint">Kode didapat saat pendaftaran dari pihak pondok</p>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary btn-block btn-lg"
                            style="width: 100%; border: none; cursor: pointer;">
                            {{-- Wrapper agar class inline flex tidak berbenturan dengan sistem hide Livewire --}}
                            <span wire:loading.remove wire:target="cari">
                                <span
                                    style="display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                                    Lihat Hafalan
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14" />
                                        <path d="m12 5 7 7-7 7" />
                                    </svg>
                                </span>
                            </span>
                            <span wire:loading wire:target="cari">
                                Mencari data...
                            </span>
                        </button>
                    </form>

                    <div
                        style="margin-top: 1.5rem; padding-top: 1.5rem; border-top: 1px solid var(--color-neutral-200);">
                        <p
                            style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; color: var(--color-neutral-400); margin-bottom: 0.75rem;">
                            Contoh tampilan:</p>
                        <div
                            style="display: flex; align-items: center; gap: 0.75rem; padding: 0.875rem; background: var(--color-neutral-50); border-radius: var(--radius-lg); border: 1px solid var(--color-neutral-200);">
                            <div class="avatar avatar-md">A</div>
                            <div style="flex: 1; min-width: 0;">
                                <p
                                    style="font-size: 0.875rem; font-weight: 800; margin: 0; color: var(--color-neutral-900);">
                                    Ahmad Fauzi</p>
                                <p style="font-size: 0.75rem; color: var(--color-neutral-500); margin: 0;">Kelas
                                    Tahfidz A &middot; 3 Juz 2 Halaman</p>
                            </div>
                            <span class="badge badge-primary">Aktif</span>
                        </div>
                        <div style="margin-top: 0.75rem;">
                            <div class="progress-wrapper">
                                <div class="progress-labels">
                                    <span class="progress-label">Progres Hafalan</span>
                                    <span class="progress-value">11%</span>
                                </div>
                                <div class="progress-track">
                                    <div class="progress-fill" style="width: 11%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- TENTANG PONDOK --}}

    <section id="tentang-pondok" style="background: var(--color-neutral-900); padding: 5rem 0;">
        <div class="container-app">
            <div style="display: grid; grid-template-columns: 1fr; gap: 3rem; align-items: start;"
                class="tentang-grid">

                <div>
                    <p class="text-label" style="color: var(--color-primary-400); margin-bottom: 0.75rem;">Tentang
                        Kami</p>
                    <h2 style="margin: 0 0 1.25rem; color: white;">Pondok Pesantren Al Ittihadul Mubarok</h2>
                    <p style="font-size: 1rem; color: rgba(255,255,255,0.7); line-height: 1.75; margin: 0 0 1.25rem;">
                        Berlokasi di Rajeg, Tangerang, Pondok Pesantren Al Ittihadul Mubarok membina santri dalam
                        program tahfidz Al-Quran dengan bimbingan langsung ustadz-ustadz pondok.
                        {{-- TODO: ganti kalimat di atas dan tambahkan sejarah singkat / tahun berdiri / visi pondok yang sebenarnya --}}
                    </p>
                    <p style="font-size: 1rem; color: rgba(255,255,255,0.7); line-height: 1.75; margin: 0;">
                        GubukTahfidzATM lahir dari kebutuhan pondok sendiri: memastikan setiap setoran hafalan
                        tercatat rapi, dan wali santri tetap bisa memantau perkembangan anaknya meski tidak setiap
                        hari datang ke pondok.
                    </p>
                </div>

                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    <div
                        style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); border-radius: var(--radius-xl); padding: 1.5rem; display: flex; align-items: center; gap: 1rem;">
                        <div
                            style="width: 44px; height: 44px; background: var(--color-primary-400); border-radius: var(--radius-md); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 24 24" fill="none" stroke="var(--color-neutral-900)"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z" />
                                <circle cx="12" cy="10" r="3" />
                            </svg>
                        </div>
                        <div>
                            <p style="font-size: 0.9375rem; font-weight: 800; margin: 0; color: white;">Rajeg,
                                Tangerang, Banten</p>
                            <p style="font-size: 0.8125rem; margin: 0; color: rgba(255,255,255,0.4);">
                                Jalan Rajeg Rajawali, Kampung Rajeg Tegal RT 03/RW 03, Desa Rajeg, Kecamatan Rajeg,
                                Kabupaten Tangerang, Provinsi Banten
                            </p>
                        </div>
                    </div>
                    <div
                        style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); border-radius: var(--radius-xl); padding: 1.5rem; display: flex; align-items: center; gap: 1rem;">
                        <div
                            style="width: 44px; height: 44px; background: var(--color-primary-400); border-radius: var(--radius-md); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 24 24" fill="none" stroke="var(--color-neutral-900)"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                <circle cx="9" cy="7" r="4" />
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                            </svg>
                        </div>
                        <div>
                            <p style="font-size: 0.9375rem; font-weight: 800; margin: 0; color: white;">
                                {{ number_format($totalSantriAktif) }} santri &middot; {{ number_format($totalUstadz) }}
                                ustadz</p>
                            <p style="font-size: 0.8125rem; margin: 0; color: rgba(255,255,255,0.4);">Aktif dalam
                                program tahfidz saat ini</p>
                        </div>
                    </div>
                    <div
                        style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); border-radius: var(--radius-xl); padding: 1.5rem; display: flex; align-items: center; gap: 1rem;">
                        <div
                            style="width: 44px; height: 44px; background: var(--color-primary-400); border-radius: var(--radius-md); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 24 24" fill="none" stroke="var(--color-neutral-900)"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                            </svg>
                        </div>
                        <div>
                            <p style="font-size: 0.9375rem; font-weight: 800; margin: 0; color: white;">Program
                                Tahfidz 30 Juz</p>
                            <p style="font-size: 0.8125rem; margin: 0; color: rgba(255,255,255,0.4);">Dibimbing
                                bertahap dari ziyadah hingga khatam</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- CTA FINAL --}}
    <section
        style="background: var(--color-primary-400); padding: 5rem 0; border-top: 2px solid var(--color-neutral-900); border-bottom: 2px solid var(--color-neutral-900);">
        <div class="container-app" style="text-align: center;">
            <p class="text-label" style="color: var(--color-neutral-700); margin-bottom: 0.75rem;">Untuk Wali Santri
            </p>
            <h2 style="margin: 0 0 1rem; color: var(--color-neutral-900);">Lihat sendiri perkembangan hafalan anak
                Anda</h2>
            <p
                style="font-size: 1.0625rem; color: var(--color-neutral-700); max-width: 460px; margin: 0 auto 2.5rem; line-height: 1.65;">
                Tidak perlu menunggu rapor bulanan — buka riwayat setoran anak Anda kapan saja lewat kode akses yang
                sudah diberikan pondok.
            </p>
            <div style="display: flex; flex-wrap: wrap; gap: 0.75rem; justify-content: center; align-items: center;">
                <a href="{{ route('hafalan.index') }}" wire:navigate class="btn btn-secondary btn-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                        stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8" />
                        <path d="m21 21-4.3-4.3" />
                    </svg>
                    Cek Hafalan Anak
                </a>
                <a href="{{ route('login') }}" wire:navigate class="btn btn-ghost btn-md"
                    style="color: var(--color-neutral-800);">
                    Masuk sebagai ustadz/admin →
                </a>
            </div>
        </div>
    </section>

    {{-- FOOTER --}}
    <footer style="background: var(--color-neutral-900); padding: 3rem 0 2rem;">
        <div class="container-app">
            <div style="display: grid; grid-template-columns: 1fr; gap: 2.5rem; margin-bottom: 2.5rem;"
                class="footer-grid">
                <div>
                    <a href="/" wire:navigate class="navbar-brand"
                        style="margin-bottom: 1rem; display: inline-flex;">
                        <div class="navbar-brand-icon" style="background: transparent; border: none;">
                            <img src="{{ asset('images/LOGO-ATM.png') }}" alt="Logo ATM"
                                style="width: 100%; height: 100%; object-fit: contain;">
                        </div>
                        <span class="navbar-brand-text" style="color: white;">GubukTahfidz<span
                                style="color: var(--color-primary-400);">ATM</span></span>
                    </a>
                    <p
                        style="font-size: 0.875rem; color: rgba(255,255,255,0.4); line-height: 1.7; max-width: 280px; margin: 0 0 1.25rem;">
                        Sistem digital resmi Pondok Pesantren Al Ittihadul Mubarok untuk mencatat dan memantau
                        hafalan Al-Quran santri.</p>

                    <div style="display: flex; align-items: center; gap: 0.625rem;">
                        <a href="https://www.instagram.com/gubuktahfidzatm?igsh=NmoweHk4dW8xYWs="
                            aria-label="Instagram"
                            style="width: 34px; height: 34px; border-radius: 50%; background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center; color: rgba(255,255,255,0.6); text-decoration: none;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <rect width="20" height="20" x="2" y="2" rx="5" />
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                                <line x1="17.5" x2="17.51" y1="6.5" y2="6.5" />
                            </svg>
                        </a>
                        <a href="https://youtube.com/@atmrajeg8793?si=Vx4YnlsUJ5XEiovV" aria-label="YouTube"
                            style="width: 34px; height: 34px; border-radius: 50%; background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center; color: rgba(255,255,255,0.6); text-decoration: none;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17" />
                                <path d="m10 15 5-3-5-3z" />
                            </svg>
                        </a>
                        <a href="https://www.tiktok.com/@atm.rajeg?_r=1&_t=ZS-97yUQg9kjzk" aria-label="TikTok"
                            style="width: 34px; height: 34px; border-radius: 50%; background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center; color: rgba(255,255,255,0.6); text-decoration: none;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M9 18a4 4 0 1 0 4-4V4" />
                                <path d="M13 4c0 3 2.5 5.5 5.5 5.5" />
                            </svg>
                        </a>
                        <a href="https://www.facebook.com/share/198pqMUnvq/" aria-label="Facebook"
                            style="width: 34px; height: 34px; border-radius: 50%; background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1); display: flex; align-items: center; justify-content: center; color: rgba(255,255,255,0.6); text-decoration: none;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 2rem;">
                    <div>
                        <p
                            style="font-size: 0.75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.08em; color: rgba(255,255,255,0.3); margin: 0 0 0.875rem;">
                            Aplikasi</p>
                        <ul
                            style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.5rem;">
                            <li><a href="{{ route('dashboard') }}" wire:navigate
                                    style="font-size: 0.875rem; color: rgba(255,255,255,0.5); text-decoration: none; font-weight: 600;">Dashboard</a>
                            </li>
                            <li><a href="{{ route('admin.siswa.index') }}" wire:navigate
                                    style="font-size: 0.875rem; color: rgba(255,255,255,0.5); text-decoration: none; font-weight: 600;">Data
                                    Santri</a></li>
                            <li><a href="{{ route('admin.setoran.index') }}" wire:navigate
                                    style="font-size: 0.875rem; color: rgba(255,255,255,0.5); text-decoration: none; font-weight: 600;">Input
                                    Setoran</a></li>

                        </ul>
                    </div>
                    <div>
                        <p
                            style="font-size: 0.75rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.08em; color: rgba(255,255,255,0.3); margin: 0 0 0.875rem;">
                            Lainnya</p>
                        <ul
                            style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.5rem;">
                            <li><a href="{{ route('hafalan.index') }}" wire:navigate
                                    style="font-size: 0.875rem; color: rgba(255,255,255,0.5); text-decoration: none; font-weight: 600;">Cek
                                    Hafalan</a></li>
                            <li><a href="#tentang-pondok"
                                    style="font-size: 0.875rem; color: rgba(255,255,255,0.5); text-decoration: none; font-weight: 600;">Tentang
                                    Pondok</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div
                style="padding-top: 1.5rem; border-top: 1px solid rgba(255,255,255,0.08); display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 1rem;">
                <p style="font-size: 0.8125rem; color: rgba(255,255,255,0.3); margin: 0;">&copy; {{ date('Y') }}
                    Pondok Pesantren Al Ittihadul Mubarok. GubukTahfidzATM.</p>
                <p class="font-arabic" style="font-size: 1rem; color: rgba(255,255,255,0.25); margin: 0;">بِسْمِ
                    اللّٰهِ</p>
            </div>
        </div>
    </footer>

    <style>
        .hero-grid {
            grid-template-columns: 1fr !important;
        }

        .how-grid {
            grid-template-columns: 1fr !important;
        }

        .cek-grid {
            grid-template-columns: 1fr !important;
        }

        .tentang-grid {
            grid-template-columns: 1fr !important;
        }

        .footer-grid {
            grid-template-columns: 1fr !important;
        }

        .feature-grid {
            grid-template-columns: 1fr !important;
        }

        @media (min-width: 1024px) {
            .hero-grid {
                grid-template-columns: 1fr 1fr !important;
            }

            .how-grid {
                grid-template-columns: repeat(3, 1fr) !important;
            }

            .cek-grid {
                grid-template-columns: 1fr 1fr !important;
            }

            .tentang-grid {
                grid-template-columns: 1.1fr 1fr !important;
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr !important;
            }

            .feature-grid {
                grid-template-columns: repeat(3, 1fr) !important;
            }
        }

        @media (min-width: 768px) {
            .tentang-grid {
                grid-template-columns: 1.1fr 1fr !important;
            }
        }

        .feat-card:hover {
            background: var(--color-neutral-50) !important;
        }
    </style>
</div>
