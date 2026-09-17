@extends('layouts.app')

@section('title', 'Careers – Join Our Team | ' . config('site.full_name'))
@section('meta-description', 'Explore career opportunities at ' . config('site.full_name') . '. Submit your job application and become part of our team.')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/pages/show.css') }}">
<style>
/* ── Sidebar info card ──────────────────────────────────────────────── */
.careers-info-card {
    background: #fff;
    border-radius: 16px;
    border: 1px solid #eee;
    box-shadow: 0 4px 24px rgba(0,0,0,.06);
    padding: 32px 28px;
    position: sticky;
    top: 90px;
}
.careers-info-card .info-icon-box {
    width: 56px; height: 56px;
    border-radius: 14px;
    background: rgba(5,42,86,.08);
    display: flex; align-items: center; justify-content: center;
    margin-bottom: 20px;
}
.careers-info-card .info-icon-box i { font-size: 24px; color: var(--color-primary); }
.careers-info-card h3 {
    font-size: 1.2rem; font-weight: 700; color: #1a1a1a; margin-bottom: 12px;
}
.careers-info-card p { font-size: .88rem; color: #666; line-height: 1.6; margin-bottom: 20px; }
.careers-perks { list-style: none; padding: 0; margin: 0 0 24px; }
.careers-perks li {
    font-size: .85rem; color: #444; margin-bottom: 10px;
    display: flex; align-items: flex-start; gap: 10px;
}
.careers-perks li i { color: #2e7d32; font-size: 14px; margin-top: 3px; flex-shrink: 0; }
.careers-contact-note {
    background: #f8f9fa; border-radius: 10px; padding: 14px 16px;
    font-size: .82rem; color: #555; border-left: 3px solid var(--color-primary);
}
.careers-contact-note a { color: var(--color-primary); font-weight: 600; text-decoration: none; }
.careers-contact-note a:hover { text-decoration: underline; }

/* ── Form Card ──────────────────────────────────────────────────────── */
.careers-form-card {
    background: #fff;
    border-radius: 16px;
    border: 1px solid #eee;
    box-shadow: 0 4px 24px rgba(0,0,0,.06);
    overflow: hidden;
}
.careers-form-header {
    background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
    padding: 28px 36px;
    color: #fff;
}
.careers-form-header h2 {
    font-family: 'Poppins', sans-serif;
    font-size: 1.35rem; font-weight: 700; color: #fff; margin-bottom: 4px;
}
.careers-form-header p { font-size: .88rem; color: rgba(255,255,255,.8); margin: 0; }

/* ── Form Controls ──────────────────────────────────────────────────── */
.careers-form-body { padding: 36px; }
.cf-label {
    font-size: .84rem; font-weight: 600; color: #333;
    margin-bottom: 6px; display: block;
}
.cf-label .req { color: #dc3545; margin-left: 2px; }
.cf-input {
    width: 100%;
    padding: 11px 16px;
    border: 1.5px solid #e0e0e0;
    border-radius: 10px;
    font-size: .92rem;
    font-family: 'Poppins', sans-serif;
    color: #333;
    transition: border-color .2s, box-shadow .2s;
    background: #fafafa;
}
.cf-input:focus {
    outline: none;
    border-color: var(--color-primary);
    box-shadow: 0 0 0 3px rgba(1,0,128,.1);
    background: #fff;
}
.cf-input::placeholder { color: #b0b0b0; font-size: .88rem; }
.cf-input.is-invalid { border-color: #dc3545; }
.cf-error { font-size: .78rem; color: #dc3545; margin-top: 4px; display: flex; align-items: center; gap: 4px; }
.cf-file-hint { font-size: .78rem; color: #888; margin-top: 4px; }
.cf-section-title {
    font-size: .75rem; font-weight: 700;
    text-transform: uppercase; letter-spacing: 1px;
    color: var(--color-primary);
    padding-bottom: 8px;
    border-bottom: 2px solid rgba(1,0,128,.12);
    margin-bottom: 20px;
}
.cf-divider { border: none; border-top: 1px solid #f0f0f0; margin: 28px 0; }
.cf-submit-btn {
    background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
    color: #fff; border: none; border-radius: 10px;
    padding: 14px 40px; font-size: 1rem; font-weight: 600;
    font-family: 'Poppins', sans-serif; cursor: pointer;
    transition: opacity .2s, transform .15s, box-shadow .2s;
    box-shadow: 0 4px 16px rgba(1,0,128,.28);
    display: inline-flex; align-items: center; gap: 10px;
}
.cf-submit-btn:hover { opacity: .9; transform: translateY(-1px); box-shadow: 0 6px 20px rgba(1,0,128,.35); }
.cf-submit-btn:active { transform: translateY(0); }
.careers-success-alert {
    border: none; border-radius: 12px;
    background: linear-gradient(135deg, #e8f5e9, #f1f8e9);
    border-left: 4px solid #2e7d32;
    padding: 16px 20px;
    display: flex; align-items: flex-start; gap: 14px;
    margin-bottom: 28px;
}
.careers-success-alert i { color: #2e7d32; font-size: 1.3rem; flex-shrink: 0; margin-top: 1px; }
.careers-success-alert p { margin: 0; font-size: .9rem; color: #1b5e20; font-weight: 500; }

@media (max-width: 991.98px) {
    .careers-info-card { position: static; margin-bottom: 32px; }
    .careers-form-body { padding: 24px 20px; }
    .careers-form-header { padding: 22px 20px; }
}
</style>
@endsection

@section('content')

{{-- ── Page Hero Banner ─────────────────────────────────────────────── --}}
<div class="page-hero">
    <div class="page-hero-blob page-hero-blob-1"></div>
    <div class="page-hero-blob page-hero-blob-2"></div>
    <div class="page-hero-content">
        <h1 class="page-hero-title" data-aos="fade-up">Careers</h1>
        <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="120">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home.get') }}"><i class="fas fa-home me-1"></i>Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Careers</li>
            </ol>
        </nav>
    </div>
    <div class="page-hero-wave">
        <svg viewBox="0 0 1440 56" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0,28 C360,56 1080,0 1440,28 L1440,56 L0,56 Z" fill="#f7f8fa"/>
        </svg>
    </div>
</div>

{{-- ── Main Content ──────────────────────────────────────────────────── --}}
<section class="careers-section">
    <div class="container">
        <div class="row g-4 align-items-start">

            {{-- ── Sidebar ──────────────────────────────────────────── --}}
            <div class="col-lg-4">
                <div class="careers-info-card">
                    <div class="info-icon-box"><i class="fas fa-school"></i></div>
                    <h3>Why Work With Us?</h3>
                    <p>Join a vibrant learning community where your work has real impact on students' futures every single day.</p>
                    <ul class="careers-perks">
                        <li><i class="fas fa-check-circle"></i> Collaborative and inclusive work environment</li>
                        <li><i class="fas fa-check-circle"></i> Continuous professional development</li>
                        <li><i class="fas fa-check-circle"></i> State-of-the-art campus infrastructure</li>
                        <li><i class="fas fa-check-circle"></i> Competitive compensation &amp; benefits</li>
                        <li><i class="fas fa-check-circle"></i> Student-centred, experiential approach</li>
                        <li><i class="fas fa-check-circle"></i> Supportive leadership team</li>
                    </ul>
                    <div class="careers-contact-note">
                        <i class="fas fa-info-circle me-2" style="color:var(--color-primary);"></i>
                        Questions? Email
                        <a href="mailto:{{ config('site.email_info') }}">{{ config('site.email_info') }}</a>
                        or call <a href="tel:{{ preg_replace('/[^0-9+]/', '', config('site.phone')) }}">{{ config('site.phone') }}</a>.
                    </div>
                </div>
            </div>

            {{-- ── Form ─────────────────────────────────────────────── --}}
            <div class="col-lg-8">
                <div class="careers-form-card">
                    <div class="careers-form-header">
                        <h2><i class="fas fa-paper-plane me-2" style="font-size:1.1rem;opacity:.85;"></i>Submit Your Application</h2>
                        <p>Fill in the details below and we'll get back to you.</p>
                    </div>

                    <div class="careers-form-body">

                        @if (session('success'))
                            <div class="careers-success-alert">
                                <i class="fas fa-check-circle"></i>
                                <p>{{ session('success') }}. We'll review your application and reach out soon.</p>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('job.store') }}" enctype="multipart/form-data" novalidate>
                            @csrf

                            {{-- Personal Details --}}
                            <p class="cf-section-title"><i class="fas fa-user me-2"></i>Personal Details</p>
                            <div class="row g-3 mb-4">
                                <div class="col-sm-6">
                                    <label class="cf-label" for="name">Full Name <span class="req">*</span></label>
                                    <input type="text" id="name" name="name"
                                           class="cf-input @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}"
                                           placeholder="e.g. Priya Sharma"
                                           pattern="^[a-zA-Z\s\.\'-]+$"
                                           maxlength="100"
                                           required>
                                    @error('name')<div class="cf-error"><i class="fas fa-exclamation-circle"></i>{{ $message }}</div>@enderror
                                </div>
                                <div class="col-sm-6">
                                    <label class="cf-label" for="email">Email Address <span class="req">*</span></label>
                                    <input type="email" id="email" name="email"
                                           class="cf-input @error('email') is-invalid @enderror"
                                           value="{{ old('email') }}"
                                           placeholder="you@example.com"
                                           maxlength="255"
                                           required>
                                    @error('email')<div class="cf-error"><i class="fas fa-exclamation-circle"></i>{{ $message }}</div>@enderror
                                </div>
                                <div class="col-sm-6">
                                    <label class="cf-label" for="phone_number">Contact Number <span class="req">*</span></label>
                                    <input type="tel" id="phone_number" name="phone_number"
                                           class="cf-input @error('phone_number') is-invalid @enderror"
                                           value="{{ old('phone_number') }}"
                                           placeholder="e.g. 9876543210"
                                           maxlength="15"
                                           required>
                                    <div id="phone-js-error" class="cf-error d-none"><i class="fas fa-exclamation-circle"></i><span>Please enter a valid 10 to 15 digit phone number.</span></div>
                                    @error('phone_number')<div class="cf-error"><i class="fas fa-exclamation-circle"></i>{{ $message }}</div>@enderror
                                </div>
                                <div class="col-sm-6">
                                    <label class="cf-label" for="qualification">Highest Qualification <span class="req">*</span></label>
                                    <input type="text" id="qualification" name="qualification"
                                           class="cf-input @error('qualification') is-invalid @enderror"
                                           value="{{ old('qualification') }}"
                                           placeholder="e.g. M.Sc., B.Ed."
                                           maxlength="255"
                                           required>
                                    @error('qualification')<div class="cf-error"><i class="fas fa-exclamation-circle"></i>{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <hr class="cf-divider">

                            {{-- Application Details --}}
                            <p class="cf-section-title"><i class="fas fa-briefcase me-2"></i>Application Details</p>
                            <div class="row g-3 mb-4">
                                <div class="col-12">
                                    <label class="cf-label" for="position_applied">Position Applied For <span class="req">*</span></label>
                                    <input type="text" id="position_applied" name="position_applied"
                                           class="cf-input @error('position_applied') is-invalid @enderror"
                                           value="{{ old('position_applied') }}"
                                           placeholder="e.g. Science Teacher, Administrative Staff"
                                           maxlength="255"
                                           required>
                                    @error('position_applied')<div class="cf-error"><i class="fas fa-exclamation-circle"></i>{{ $message }}</div>@enderror
                                </div>
                                <div class="col-12">
                                    <label class="cf-label" for="message">Cover Note / Message <span class="req">*</span></label>
                                    <textarea id="message" name="message" rows="5"
                                              class="cf-input @error('message') is-invalid @enderror"
                                              placeholder="Briefly describe your experience and why you'd like to join us…"
                                              maxlength="3000"
                                              required>{{ old('message') }}</textarea>
                                    @error('message')<div class="cf-error"><i class="fas fa-exclamation-circle"></i>{{ $message }}</div>@enderror
                                </div>
                                <div class="col-12">
                                    <label class="cf-label" for="resume_file">
                                        Upload Résumé
                                        <span style="font-weight:400;color:#888;">(optional – PDF only)</span>
                                    </label>
                                    <input type="file" id="resume_file" name="resume_file"
                                           class="cf-input @error('resume_file') is-invalid @enderror"
                                           accept="application/pdf,.pdf">
                                    <p class="cf-file-hint"><i class="fas fa-file-pdf me-1"></i>Accepted format: PDF · Max size: 5 MB</p>
                                    @error('resume_file')<div class="cf-error"><i class="fas fa-exclamation-circle"></i>{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <hr class="cf-divider">

                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                <p class="mb-0" style="font-size:.8rem;color:#888;">
                                    <i class="fas fa-lock me-1"></i>Your information is kept confidential.
                                </p>
                                <button type="submit" class="cf-submit-btn">
                                    <i class="fas fa-paper-plane"></i> Submit Application
                                </button>
                            </div>

                        </form>
                    </div>{{-- /careers-form-body --}}
                </div>{{-- /careers-form-card --}}
            </div>{{-- /col --}}

        </div>{{-- /row --}}
    </div>{{-- /container --}}
</section>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const phoneInput = document.getElementById('phone_number');
    const phoneError = document.getElementById('phone-js-error');
    const form = phoneInput ? phoneInput.closest('form') : null;

    if (phoneInput) {
        // Restrict input in real-time to numbers, plus, hyphens, and spaces only
        phoneInput.addEventListener('input', function () {
            this.value = this.value.replace(/[^0-9\+\-\s\(\)]/g, '');

            const digitsOnly = this.value.replace(/\D/g, '');
            if (this.value.length > 0 && (digitsOnly.length < 10 || digitsOnly.length > 15)) {
                this.classList.add('is-invalid');
                phoneError.classList.remove('d-none');
            } else {
                this.classList.remove('is-invalid');
                phoneError.classList.add('d-none');
            }
        });
    }

    if (form && phoneInput) {
        form.addEventListener('submit', function (e) {
            const digitsOnly = phoneInput.value.replace(/\D/g, '');
            if (digitsOnly.length < 10 || digitsOnly.length > 15) {
                e.preventDefault();
                phoneInput.classList.add('is-invalid');
                phoneError.classList.remove('d-none');
                phoneInput.focus();
            }
        });
    }
});
</script>
@endsection
