<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
crossorigin="anonymous" referrerpolicy="no-referrer" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="{{asset('frontend/css/messageStyle.css')}}" rel="stylesheet">
<link href="{{asset('frontend/css/headerAdminStyle.css')}}" rel="stylesheet">
<div class="container-scroller">
<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
      <div class="me-3">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
      </div>
      <div>
        <a class="navbar-brand brand-logo" href="/admin">
          <img src="{{asset('backend/assets/images/logo.svg')}}" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="/admin">
          <img src="{{asset('backend/assets/images/logo-mini')}}.svg" alt="logo" />
        </a>
      </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-top">
        <ul class="navbar-nav">
            <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
              <h3 class="welcome-text" style="color: rgb(68,94,187);font-weight: bold">Thống kê hồ sơ<span class="text-black fw-bold"></span></h3>
            </li>
          </ul>
      <ul class="navbar-nav ms-auto">

        <li class="nav-item d-none d-lg-block">
          <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
            <span class="input-group-addon input-group-prepend border-right">
              <span class="icon-calendar input-group-text calendar-icon"></span>
            </span>
            <input type="text" class="form-control">
          </div>
        </li>
        <li class="nav-item">
          <form class="search-form" action="#">
            <i class="icon-search"></i>
            <input type="search" class="form-control" placeholder="Tìm kiếm" title="Tìm kiếm">
          </form>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
            <i class="icon-bell"></i>
          </a>

        </li>
        <li class="nav-item dropdown">
          <a class="nav-link count-indicator" id="countDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="icon-mail icon-lg"></i>
          </a>

        </li>
        <li class="nav-item dropdown d-none d-lg-block user-dropdown" id="li-info">
          {{-- <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <img class="img-xs rounded-circle" src="{{asset('backend/assets/images/faces/face8')}}.jpg" alt="Profile image"> </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
            <div class="dropdown-header text-center">
              <img class="img-md rounded-circle" src="{{asset('backend/assets/images/faces/face8')}}.jpg" alt="Profile image">
              <p class="mb-1 mt-3 font-weight-semibold" id="test1"></p>
            </div>
            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My
              Profile <span class="badge badge-pill badge-danger">1</span></a>
            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i>
              Messages</a>
            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i>
              Activity</a>
            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i>
              FAQ</a>
            <a class="dropdown-item" href="{{ route('admin.logout') }}" ><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
          </div> --}}
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
        data-bs-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
  </nav>
  <div class="container-fluid page-body-wrapper">
    <!-- partial:../../partials/_settings-panel.html -->
    <div class="theme-setting-wrapper">

</div>
{{--//////////////////////////////////////// message start ////////////////////////////////////////--}} 
@if (session('UserName')!='1111111111')
<div class="container-message" id="chatBox">
    <img src="{{ asset('frontend/Images1/iconKimDong.png') }}" alt="Message Icon" id="message-icon">
    <div class="customer-list" id="customer-list-chat">
        <ul id="customerList-ul">
  
        </ul>
    </div>
    <div class="chat-content" style="width: 344px">
        <div class="chat-box" id="messageContainer">
            <!-- Message Header -->
            <div class="message-header" style="background-color: rgb(100,149,237)">
                <div class="avatar">
                    <img src="{{ asset('frontend/Images1/avatar.png') }}" alt="Avatar">
                </div>
                <div class="user-info">
                    <p></p>
                </div>
                <button class="close-btn" id="closeChatBox"><i class="fa-regular fa-circle-xmark"></i></button>
            </div>
            <div class="body-message" id="bodyMessage">
                <!-- Incoming and Outgoing Messages will be added here using JavaScript -->
            </div>
            <!-- Input Field and Send Button -->
            <div class="input-field">
                <input type="text" placeholder="Tin nhắn ..." id="messageInput">
                <button id="sendButton">Send</button>
            </div>
        </div>
    </div>
  </div>
@endif

{{--//////////////////////////////////////// message end ////////////////////////////////////////--}}
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
  $(document).ready(function() {

            $.ajax({
                url: '/admin/staff-info',
                method: 'GET',
                success: function(data) {
                    let profileImagePath = `{{ asset('frontend/Images1/${data.AnhDaiDien}') }}`;
                    let profileImageFallback = `{{ asset('backend/assets/images/faces/face8.jpg') }}`;
                    $('#li-info').html(`
                        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="img-xs rounded-circle" src="${profileImagePath}" alt="Profile image">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">
                                <img class="img-md rounded-circle" src="${profileImageFallback}" alt="Profile image">
                                <p class="mb-1 mt-3 font-weight-semibold">${data.TenNV}</p>
                            </div>
                            <a href="/admin/adminstaff" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> Trang cá nhân<span class="badge badge-pill badge-danger">1</span></a>
                            <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i> Đăng xuất</a>
                        </div>
                    `);
                },
                error: function(xhr, status, error) {
                    console.error('Failed to fetch staff info:', error);
                }
            });

        $(document).on('click', '.emoji', function() {
            const emoji = $(this);
            const messageId = emoji.closest('.incoming-message').data('message-id');
            const emojiId = emoji.data('emoji');

            if (emoji.hasClass('active')) {
                setEmoji(messageId, 0); // Thay đổi giá trị emojiId thành 0
                emoji.removeClass('active').css('background-color', '');
            } else {
                $(`.incoming-message[data-message-id="${messageId}"] .emoji`).removeClass('active').css('background-color', '');
                emoji.addClass('active').css('background-color', '#dcdcdc');
                setEmoji(messageId, emojiId);
                // Tự động đóng options-menu khi chọn emoji
                $('.options-menu').hide();
            }
        });

        function setEmoji(messageId, emojiId) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/admin/message/emoji/' + messageId,
                method: 'PUT',
                data: { emoji: emojiId }, // Chỉ truyền giá trị emoji
                success: function(response) {
                    // Cập nhật emoji thành công
                },
                error: function(xhr, status, error) {
                    console.error('Failed to update emoji:', error);
                }
            });
        }

      //  sự kiện click cho .options-trigger
        $(document).on('click', '.options-trigger', function() {
            const menu = $(this).siblings('.options-menu');
            // Ẩn tất cả các options-menu khác trước khi hiển thị cái này
            $('.options-menu').not(menu).hide();
            menu.toggle();
        });


          const chatBox = $("#chatBox");
          const closeChatBtn = $("#closeChatBox");
          const closeIcon = $("#message-icon");
          const customerList = $("#customer-list-chat");
          const currentMaNV = "{{ session('MaNV') }}"; 
          Pusher.logToConsole = true;

          var pusher = new Pusher('44a6bb754707f0034c10', {
              cluster: 'ap1',
              forceTLS: true
          });
          var channel = pusher.subscribe('chat');
        channel.bind('sent', function(data) {
            if (data.message) {
                try {
                    var messageContent = JSON.parse(data.message.message);
                } catch (e) {
                    var messageContent = data.message.message;
                }
                if (data.message.MaKH !== MaKH) {
                  return;
                }
                
                if (Array.isArray(messageContent)) {
                    renderProductMessage(messageContent, data.message.id);
                } else {
                    if (data.message.check === 1) {
                        var incomingMessage = renderIncomingMessage(messageContent, data.message.thoigiannhan,data.message.id,data.message.emoji);
                        if (data.message.ThongBao == 2) {
                            // Cập nhật hiển thị của thông báo
                            $(`#customerList-ul li[data-makhachang='${data.message.MaKH}'] .notification-kh`).css('display', 'block');
                        }
                        $(".body-message").append(incomingMessage);
                    } else if (data.message.check === 2) {
                        var outgoingMessage = renderOutgoingMessage(messageContent, data.message.thoigiannhan,data.message.id,data.message.emoji);
                        $(".body-message").append(outgoingMessage);
                    }
                }
            }
            scrollToBottom();
        });



      // Toggle chat box visibility when button is clicked
         closeIcon.on("click", function(event) {
            const chatContent = chatBox.find(".chat-content");
            if (chatContent.css("display") === "none" || !chatContent.css("display")) {
                chatContent.css("display", "block");
                customerList.css("display", "block");
                closeIcon.css("display", "none");
                scrollToBottom();
            } else {
                chatContent.css("display", "none");
            }
            event.stopPropagation();
        });

        // Close chat box when close button is clicked
        closeChatBtn.on("click", function(event) {
            const chatContent = chatBox.find(".chat-content");
            chatContent.css("display", "none");
            closeIcon.css("display", "block");
            customerList.css("display", "none");
            event.stopPropagation(); 
        });

        // Scroll to bottom function
        function scrollToBottom() {
            var messageContainer = document.getElementById('bodyMessage');
            messageContainer.scrollTop = messageContainer.scrollHeight;
        }

        function getIcon(emojiId) {
            let icon = '';
            if (emojiId) {
                if (emojiId == '1') {
                    icon = '❤️';
                } else if (emojiId == '2') {
                    icon = '😄';
                } else if (emojiId == '3') {
                    icon = '👍';
                } else if (emojiId == '4') {
                    icon = '🥰';
                } else if (emojiId == '5') {
                    icon = '🤔';
                } else if (emojiId == '6') {
                    icon = '😡';
                }
            }
            return icon;
        }
      // Render tin nhắn nhận
      function renderIncomingMessage(message, time, id, emojiId) {
            let icon = getIcon(emojiId);
            const existingMessage = $(`.incoming-message[data-message-id="${id}"]`);

            // If the message is deleted
            if (message === 'Tin nhắn đã bị thu hồi') {
                if (existingMessage.length) {
                    // Update existing message content
                    existingMessage.find('.message-content').html(`
                        <p>${message}</p>
                        <span class="time">${time}</span>
                    `);
                    existingMessage.find('.message-options').css('display', 'none');
                    existingMessage.find('.avatar img').css('display', 'none');
                    existingMessage.find('.set-emoji').css('display', 'none');
                } else {
                    // Append new deleted message content
                    return `
                        <div class="incoming-message" data-message-id="${id}">
                            <div class="avatar">
                                <img src="{{ asset('frontend/Images1/avatar.png') }}" alt="Sender Avatar">
                            </div>
                            <div class="message-content incoming">
                                <p>${message}</p>
                                <span class="time">${time}</span>
                            </div>
                        </div>
                    `;
                }
            } else {
                if (existingMessage.length) {
                    // Update existing message content
                    existingMessage.find('.set-emoji').html(icon);
                    existingMessage.find('.emoji').removeClass('active').css('background-color', ''); // Reset previous active emoji
                    existingMessage.find(`.emoji[data-emoji="${emojiId}"]`).addClass('active').css('background-color', '#dcdcdc');
                } else {
                    // Remove any existing message with the same ID before appending
                    $(`.incoming-message[data-message-id="${id}"]`).remove();

                    let emojis = '';
                    for (let i = 1; i <= 6; i++) {
                        let activeClass = emojiId === i ? 'class="emoji active"' : 'class="emoji"';
                        let bgColor = emojiId === i ? 'style="cursor: pointer; background-color: #dcdcdc;"' : 'style="cursor: pointer;"';
                        emojis += `<span ${activeClass} data-emoji="${i}" ${bgColor}>${getIcon(i)}</span>`;
                    }
                    // Append new message content
                    return `
                        <div class="incoming-message" data-message-id="${id}">
                            <div class="avatar">
                                <img src="{{ asset('frontend/Images1/avatar.png') }}" alt="Sender Avatar">
                            </div>
                            <div class="message-content">
                                <p>${message}</p>
                                <span class="time">${time}</span>
                                <span class="set-emoji">${icon}</span>
                            </div>
                            
                            <div class="message-options">
                                <span class="options-trigger">⋮</span>
                                <div class="options-menu" style="display: none;">
                                    <div class="emoji-picker">
                                        ${emojis}
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                }
            }
        }

      // Render tin nhắn gửi
      function renderOutgoingMessage(message, time, id, emojiId) {
            let icon = getIcon(emojiId);
            const existingMessage = $(`.outgoing-message[data-message-id="${id}"]`);

            // If the message is deleted
            if (message === 'Tin nhắn đã bị thu hồi') {
                if (existingMessage.length) {
                    // Update existing message content
                    existingMessage.find('.message-content').html(`
                        <p>${message}</p>
                        <span class="time">${time}</span>
                    `);
                    existingMessage.find('.message-options').css('display', 'none');
                    existingMessage.find('.avatar img').css('display', 'none');
                    existingMessage.find('.set-emoji').css('display', 'none');
                } else {
                    // Append new deleted message content
                    return `
                        <div class="outgoing-message" data-message-id="${id}">
                            <div class="message-content outgoing">
                                <p>${message}</p>
                                <span class="time">${time}</span>
                            </div>
                        </div>
                    `;
                }
            } else {
                if (existingMessage.length) {
                    // Update existing message content
                    existingMessage.find('.set-emoji').html(icon);
                    existingMessage.find('.emoji').removeClass('active').css('background-color', ''); // Reset previous active emoji
                    existingMessage.find(`.emoji[data-emoji="${emojiId}"]`).addClass('active').css('background-color', '#dcdcdc');
                } else {
                    // Remove any existing message with the same ID before appending
                    $(`.outgoing-message[data-message-id="${id}"]`).remove();

                    // Append new message content
                    return `
                        <div class="outgoing-message" data-message-id=${id}>
                            <div class="message-options">
                                <span class="options-trigger">⋮</span>
                                <div class="options-menu" style="display: none;width: 40px;">
                                    <button class="delete-message" data-message-id="${id}">Gỡ</button>
                                </div>
                            </div>
                            <div class="message-content outgoing">
                                <p>${message}</p>
                                <span class="time">${time}</span>
                                <span class="set-emoji">${icon}</span>
                            </div>
                            <div class="avatar">
                                <img src="{{ asset('frontend/Images1/iconKimDong.png') }}" alt="User Avatar">
                            </div>
                        </div>
                    `;
                }
            }
        }

        
        function truncateText(text, maxLength) {
            if (text.length > maxLength) {
                return text.slice(0, maxLength) + '...';
            }
            return text;
        }

        // Render thông tin sản phẩm
        function renderProductMessage(productMess, id) {
            const truncatedName = truncateText(productMess[2], 23);
            const productHtml = `
                <div class="incoming-message" data-message-id="${id}">
                    <div class="message-content incoming" style="background-color: rgb(237, 241, 255); border-radius: 0%;">
                        <div class="product-message"> 
                            <div class="product-image">
                                <img src="{{ asset('frontend/Images1/${productMess[1]}') }}" alt="Product Image" style="border-radius: 0%;with:60px;height:60px">
                            </div>
                            <div class="product-info">
                                <p class="product-id">Mã: ${productMess[0]}</p>
                                <p>${truncatedName}</p>
                                <p class="product-name">Giá : ${productMess[3]}</p>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            if (productMess[2] === 'Tin nhắn đã bị thu hồi') {
                return `
                <div class="incoming-message" data-message-id="${id}">
                    <div class="message-content incoming">
                        <p>${productMess[2]}</p>
                        <span class="time">${time}</span>
                    </div>
                </div>
                `;
            }

            var messageContainer = document.getElementById('bodyMessage');
            $(messageContainer).append(productHtml);
            scrollToBottom();
    }
      // Render messages
    // Render messages
        function renderMessages(messages) {
            messages.forEach(function(message) {
                try {
                    var messageContent = JSON.parse(message.message);
                } catch (e) {
                    var messageContent = message.message;
                }

                if (Array.isArray(messageContent)) {
                    renderProductMessage(messageContent,message.id);
                } else {
                    if (message.check === 1) {
                        var incomingMessage = renderIncomingMessage(messageContent, message.thoigiannhan,message.id,message.emoji);
                        $(".body-message").append(incomingMessage);
                    } else if (message.check === 2) {
                        var outgoingMessage = renderOutgoingMessage(messageContent, message.thoigiannhan,message.id,message.emoji);
                        $(".body-message").append(outgoingMessage);
                    }
                }
            });
            scrollToBottom();
        }

        $(document).on('click', '.delete-message', function() {
            const messageId = $(this).data('message-id');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/admin/message/remove/' + messageId,
                method: 'PUT',
                success: function(response) {
                    const messageElement = $(`.outgoing-message[data-message-id="${messageId}"]`);
                messageElement.find('.message-content').html(`<p>${response.message}</p><span class="time">${response.thoigiannhan}</span>`);
                messageElement.find('.message-options').css('display', 'none');
                messageElement.find('.avatar img').css('display', 'none');
                messageElement.find('.set-emoji').css('display', 'none');
                },
                error: function(xhr, status, error) {
                    console.error('Failed to remove message:', error);
                }
            });
        });

        var MaKH;
      var checkNotification;

      $(document).on('click', '#customerList-ul li', function() {
          $('#customerList-ul li').removeClass('active');
          $(this).addClass('active'); 
          var maKH = $(this).data('makhachang');
          var tenKH = $(this).data('tenkh');
          MaKH = maKH;
          $('.message-header .user-info p').text(tenKH);


          $.ajax({
                  url: '/admin/message/client/' + maKH,
                  method: 'GET',
                  success: function(response) {
                      $('#bodyMessage').empty(); 
                      renderMessages(response);
                      scrollToBottom(); 
                  },
                  error: function(xhr, status, error) {
                      console.error('Failed to fetch messages:', error);
                  }
              });

            });

      $.ajax({
          url: '/admin/message/client', 
          method: 'GET',
          success: function(response) {
              var html = '';
              response.forEach(function(customer) {
                  html += `
                      <li data-makhachang='${customer.MaKH}' data-tenkh='${customer.TenKH}'>
                          <div class="avatar">
                              <img src="/frontend/Images1/${customer.AnhDaiDien}" alt="Avatar" style="width: 50px">
                          </div>
                          <div class="user-info">
                              <p>${customer.TenKH}</p>
                          </div>
                      </li>
                  `;
              });
              $('#customerList-ul').html(html);

          },
          error: function(xhr, status, error) {
              console.error('Failed to fetch customers:', error);
          }
      });


      $("#sendButton").on("click", function() {
          var message = $("#messageInput").val(); 
          var time = new Date().toLocaleTimeString();

          $.ajax({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              url: '/admin/message/Adminstore', 
              method: 'POST',
              data: {
                  MaKH: MaKH,
                  message: message, 
                  check: 2,
              },
              success: function(response) {
                  $("#messageInput").val('');
              },
              error: function(xhr, status, error) {
                  console.error('Failed to send message:', error);
              }
          });
      });

      });
</script>