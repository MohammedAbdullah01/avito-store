<a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
    <i class="bi bi-bell"></i>
    <span class="badge bg-danger badge-number">{{ $unredcount }}</span>
</a><!-- End Messages Icon -->

<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages" style="width: 300px;">
    <li class="dropdown-header">
        You Have {{ $unredcount }} New Unread Notifications
    </li>
    <li>
        <hr class="dropdown-divider">
    </li>
    @forelse ($notifications as $notification)
        <li class="message-item">
            <a href="{{ route('supplier.notification.show', $notification->id) }}">
                <div>
                    <h4>
                        <i
                            class="{{ $notification->unread() ? 'bi bi-eye-slash-fill text-primary' : 'bi bi-eye-fill text-primary' }}"></i>
                        {{ $notification->data['title'] }}
                    </h4>
                    <p>{{ $notification->data['body'] }}</p>
                    <p>{{ $notification->data['quantity'] }}</p>
                    <p>{{ $notification->created_at->diffForhumans() }}</p>
                </div>
            </a>
        </li>
    @empty
        <li class="alert alert-danger text-center ">
            {{ __('No There Notification ') }} <i class="bi bi-emoji-frown-fill"></i></li>
    @endforelse

    <li>
        <hr class="dropdown-divider">
    </li>
    <li class="dropdown-footer">
        <a href="{{ route('admin.notifications.all') }}">Show all
            notifications</a>
    </li>

</ul>
