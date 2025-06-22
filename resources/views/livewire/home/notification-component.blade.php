<!-- Ícone com contador -->
<div>
    <a href="#" id="notification-btn">
        <i class="fa fa-bell-o"></i>
        <span class="badge" style="background: #133070" wire:poll.keep-alive>
            {{ count($user->unreadNotifications) }}
        </span>
    </a>
</div>

  

