@props(['url', 'title', 'description' => '', 'simple' => false])

@php
    $shareUrl = $url ?? url()->current();
    $shareTitle = $title ?? '';
    $shareText = $description ? $shareTitle . ' - ' . $description : $shareTitle;
    
    // Social media share URLs
    $whatsappUrl = 'https://wa.me/?text=' . urlencode($shareText . ' ' . $shareUrl);
    $facebookUrl = 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode($shareUrl);
    $twitterUrl = 'https://twitter.com/intent/tweet?text=' . urlencode($shareText) . '&url=' . urlencode($shareUrl);
    $telegramUrl = 'https://t.me/share/url?url=' . urlencode($shareUrl) . '&text=' . urlencode($shareText);
@endphp

<div class="share-button-wrapper position-relative">
    <button type="button" class="btn btn-outline-primary share-btn" data-bs-toggle="dropdown" aria-expanded="false" title="Share">
        <i class="bi bi-share"></i>
        <span class="d-none d-md-inline ms-2">Share</span>
    </button>
    <ul class="dropdown-menu dropdown-menu-end share-dropdown {{ $simple ? 'share-dropdown-simple' : '' }}">
        <li>
            <button type="button" class="dropdown-item share-copy-link" data-url="{{ $shareUrl }}">
                <i class="bi bi-link-45deg me-2"></i>Copy Link
            </button>
        </li>
        @if(!$simple)
        <li><hr class="dropdown-divider"></li>
        @endif
        <li>
            <a href="{{ $whatsappUrl }}" target="_blank" class="dropdown-item">
                <i class="bi bi-whatsapp me-2 text-success"></i>WhatsApp
            </a>
        </li>
        @if(!$simple)
        <li>
            <a href="{{ $facebookUrl }}" target="_blank" class="dropdown-item">
                <i class="bi bi-facebook me-2 text-primary"></i>Facebook
            </a>
        </li>
        <li>
            <a href="{{ $twitterUrl }}" target="_blank" class="dropdown-item">
                <i class="bi bi-twitter me-2 text-info"></i>Twitter
            </a>
        </li>
        <li>
            <a href="{{ $telegramUrl }}" target="_blank" class="dropdown-item">
                <i class="bi bi-telegram me-2 text-primary"></i>Telegram
            </a>
        </li>
        <li class="d-block d-md-none">
            <button type="button" class="dropdown-item share-native" data-title="{{ $shareTitle }}" data-text="{{ $shareText }}" data-url="{{ $shareUrl }}">
                <i class="bi bi-share-fill me-2"></i>More Options
            </button>
        </li>
        @endif
    </ul>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Copy link functionality
    document.querySelectorAll('.share-copy-link').forEach(button => {
        button.addEventListener('click', function() {
            const url = this.getAttribute('data-url');
            navigator.clipboard.writeText(url).then(() => {
                const originalText = this.innerHTML;
                this.innerHTML = '<i class="bi bi-check-circle me-2 text-success"></i>Copied!';
                setTimeout(() => {
                    this.innerHTML = originalText;
                }, 2000);
            }).catch(() => {
                // Fallback for older browsers
                const textarea = document.createElement('textarea');
                textarea.value = url;
                document.body.appendChild(textarea);
                textarea.select();
                document.execCommand('copy');
                document.body.removeChild(textarea);
                const originalText = this.innerHTML;
                this.innerHTML = '<i class="bi bi-check-circle me-2 text-success"></i>Copied!';
                setTimeout(() => {
                    this.innerHTML = originalText;
                }, 2000);
            });
        });
    });
    
    // Native share API (mobile)
    document.querySelectorAll('.share-native').forEach(button => {
        button.addEventListener('click', async function() {
            const title = this.getAttribute('data-title');
            const text = this.getAttribute('data-text');
            const url = this.getAttribute('data-url');
            
            if (navigator.share) {
                try {
                    await navigator.share({
                        title: title,
                        text: text,
                        url: url
                    });
                } catch (err) {
                    console.log('Error sharing:', err);
                }
            }
        });
    });
});
</script>
@endpush

@push('styles')
<style>
    .share-button-wrapper .share-btn {
        border-radius: 0.5rem;
        padding: 0.5rem 1rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .share-button-wrapper .share-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    
    .share-dropdown {
        min-width: 200px;
        border-radius: 0.5rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        border: 1px solid #e2e8f0;
    }
    
    .share-dropdown .dropdown-item {
        padding: 0.75rem 1rem;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
    }
    
    .share-dropdown .dropdown-item:hover {
        background-color: #f8f9fa;
        color: #667eea;
    }
    
    .share-dropdown .dropdown-item i {
        font-size: 1.1rem;
        width: 20px;
    }

    /* Mobile - Smaller share button */
    @media (max-width: 767.98px) {
        .share-button-wrapper .share-btn {
            padding: 0.35rem 0.6rem !important;
            font-size: 0.75rem !important;
            border-radius: 0.375rem !important;
        }

        .share-button-wrapper .share-btn i {
            font-size: 0.85rem !important;
        }

        .share-button-wrapper .share-btn span {
            display: none !important;
        }

        .share-dropdown {
            min-width: 160px !important;
        }

        .share-dropdown .dropdown-item {
            padding: 0.6rem 0.9rem !important;
            font-size: 0.875rem !important;
        }

        .share-dropdown .dropdown-item i {
            font-size: 1rem !important;
            width: 18px !important;
        }
    }
</style>
@endpush

