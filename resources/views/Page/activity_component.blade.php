<div class="activities">
    <div class="activities__header">
        <h2>Recent Activities</h2>
    </div>
    <!-- {% for message in room_messages %}
    <div class="activities__box">
        <div class="activities__boxHeader roomListRoom__header">
            <a href="{% url 'user-profile' message.user.id %}" class="roomListRoom__author">
                <div class="avatar avatar--small">
                    <img src="{{message.user.avatar.url}}" />
                </div>
                <p>
                    @{{message.user.username}}
                    <span>{{message.created|timesince}} ago</span>
                </p>
            </a>

            {% if request.user == message.user %}
            <div class="roomListRoom__actions">
                <a href="{% url 'delete-message' message.id %}">
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                        <title>remove</title>
                        <path
                            d="M27.314 6.019l-1.333-1.333-9.98 9.981-9.981-9.981-1.333 1.333 9.981 9.981-9.981 9.98 1.333 1.333 9.981-9.98 9.98 9.98 1.333-1.333-9.98-9.98 9.98-9.981z">
                        </path>
                    </svg>
                </a>
            </div>
            {% endif %}

        </div>
        <div class="activities__boxContent">
            <p>replied to post “<a href="{% url 'room' message.room.id %}">{{message.room}}</a>”</p>
            <div class="activities__boxRoomContent">{{message.body}}</div>
        </div>
    </div>
    {% endfor %} -->

</div>