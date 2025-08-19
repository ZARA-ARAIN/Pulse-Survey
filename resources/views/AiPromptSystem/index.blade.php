@extends('layouts.app')

@section('content')
<div class="h-full bg-white flex flex-col absolute top-16 left-16 right-0">
    <div class="flex flex-1 overflow-hidden" style="margin-top: -1rem;"> <!-- Force remove any margin -->
        <!-- Sidebar -->
<div class="w-64 bg-gray-50 border-r border-gray-200 flex flex-col h-[92vh] overflow-y-auto">
            <!-- Search bar in history sidebar -->
            <div class="p-3">
                <div class="relative">
                    <input 
                        type="text" 
                        placeholder="Search chat history..." 
                        class="w-full p-2 pl-8 pr-3 bg-white border border-gray-300 rounded-md focus:ring-1 focus:ring-indigo-500 focus:border-transparent text-sm text-gray-700 placeholder-gray-400"
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 absolute left-2.5 top-2.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
            
            <div class="flex-1 overflow-y-auto px-0 py-4">
                <div class="pb-2 text-sm font-normal text-gray-500 pl-4">Chat History</div>
                <div class="space-y-2 px-3">
                    <div class="pt-2 px-3 text-xs font-medium text-indigo-600 uppercase tracking-wider">Today</div>
                    <a href="#" class="block px-3 py-2.5 text-sm text-gray-700 hover:bg-gray-200 rounded-md transition hover:text-indigo-600 flex items-center">
                        <span class="w-2 h-2 bg-indigo-500 rounded-full mr-3"></span>
                        Explain quantum computing
                    </a>
                    <a href="#" class="block px-3 py-2.5 text-sm text-gray-700 hover:bg-gray-200 rounded-md transition hover:text-indigo-600 flex items-center">
                        <span class="w-2 h-2 bg-indigo-500 rounded-full mr-3"></span>
                        Write a poem about AI
                    </a>
                    <a href="#" class="block px-3 py-2.5 text-sm text-gray-700 hover:bg-gray-200 rounded-md transition hover:text-indigo-600 flex items-center">
                        <span class="w-2 h-2 bg-indigo-500 rounded-full mr-3"></span>
                        How to make a website?
                    </a>
                    
                    <div class="pt-3 px-3 text-xs font-medium text-indigo-600 uppercase tracking-wider">Yesterday</div>
                    <a href="#" class="block px-3 py-2.5 text-sm text-gray-700 hover:bg-gray-200 rounded-md transition hover:text-indigo-600 flex items-center">
                        <span class="w-2 h-2 bg-indigo-500 rounded-full mr-3"></span>
                        Python vs JavaScript
                    </a>
                    <a href="#" class="block px-3 py-2.5 text-sm text-gray-700 hover:bg-gray-200 rounded-md transition hover:text-indigo-600 flex items-center">
                        <span class="w-2 h-2 bg-indigo-500 rounded-full mr-3"></span>
                        Best practices for React
                    </a>
                    
                    <div class="pt-3 px-3 text-xs font-medium text-indigo-600 uppercase tracking-wider">Previous 7 Days</div>
                    <a href="#" class="block px-3 py-2.5 text-sm text-gray-700 hover:bg-gray-200 rounded-md transition hover:text-indigo-600 flex items-center">
                        <span class="w-2 h-2 bg-indigo-500 rounded-full mr-3"></span>
                        Marketing strategy tips
                    </a>
                </div>
            </div>
            
            <!-- New chat button -->
            <div class="p-3 border-t border-gray-200">
                <button id="sidebarNewChat" class="w-full flex items-center justify-between px-4 py-2.5 text-sm font-medium text-white rounded-md hover:opacity-90 transition shadow-sm bg-gradient-to-r from-purple-500 to-pink-500 to-orange-400 ">
                    <span>New chat</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </button>
            </div>
        </div>
        
        <!-- Main Chat Area -->
        <div class="flex-1 flex flex-col h-full overflow-hidden bg-white">
            <!-- Header with buttons - fixed at top -->
            <div class="p-3 border-b border-gray-200 flex items-center bg-white sticky top-0 z-10">
                <div class="flex items-center space-x-2 ml-auto">
                    <button class="text-xs font-medium bg-gradient-to-r from-purple-500 to-pink-500 to-orange-400  bg-clip-text text-transparent hover:opacity-90 px-3 py-1 rounded-full border border-pink-200 hover:border-purple-300 transition">
                        Upgrade
                    </button>

                    <button class="text-gray-500 hover:text-indigo-600 p-1.5 rounded-md hover:bg-gray-100 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                    </button>
                    
                    <button class="text-gray-500 hover:text-indigo-600 p-1.5 rounded-md hover:bg-gray-100 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                        </svg>
                    </button>
                    
                    <button class="text-gray-500 hover:text-indigo-600 p-1.5 rounded-md hover:bg-gray-100 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                        </svg>
                    </button>

                    <button id="newChatButton" class="flex items-center text-gray-500 hover:text-indigo-600 p-1.5 rounded-md hover:bg-gray-100 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 640 640">
                            <path fill="currentColor" d="M535.6 85.7C513.7 63.8 478.3 63.8 456.4 85.7L432 110.1L529.9 208L554.3 183.6C576.2 161.7 576.2 126.3 554.3 104.4L535.6 85.7zM236.4 305.7C230.3 311.8 225.6 319.3 222.9 327.6L193.3 416.4C190.4 425 192.7 434.5 199.1 441C205.5 447.5 215 449.7 223.7 446.8L312.5 417.2C320.7 414.5 328.2 409.8 334.4 403.7L496 241.9L398.1 144L236.4 305.7zM160 128C107 128 64 171 64 224L64 480C64 533 107 576 160 576L416 576C469 576 512 533 512 480L512 384C512 366.3 497.7 352 480 352C462.3 352 448 366.3 448 384L448 480C448 497.7 433.7 512 416 512L160 512C142.3 512 128 497.7 128 480L128 224C128 206.3 142.3 192 160 192L256 192C273.7 192 288 177.7 288 160C288 142.3 273.7 128 256 128L160 128z"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Chat Content -->
            <div class="flex-1 overflow-hidden flex flex-col">
                <!-- Initial Prompt View -->
                <div id="initialView" class="flex-1 flex flex-col items-center justify-center p-4 text-center overflow-y-auto">
                    <div class="w-full max-w-2xl">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">How Can I Assist You?</h2>
                        <p class="text-gray-500 mb-4 text-sm">Ask anything</p>
                        
                        <div class="relative w-full bg-white rounded-lg border border-gray-300">
                            <textarea
                                id="promptInput"
                                rows="1"
                                placeholder="Message AI..."
                                class="w-full p-2 pr-10 border-0 focus:ring-0 resize-none rounded-lg text-sm bg-transparent text-gray-700 placeholder-gray-400"
                                style="min-height: 40px; max-height: 200px;"
                            ></textarea>
                            <button id="sendInitialPrompt" class="absolute right-2 bottom-2 bg-gradient-to-r from-purple-500 to-pink-500 to-orange-400  text-white p-1.5 rounded-md hover:opacity-90 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Chat View (Hidden Initially) -->
                <div id="chatView" class="hidden flex-1 flex flex-col overflow-hidden">
                    <div class="flex-1 overflow-y-auto p-4 custom-scrollbar space-y-4" id="messagesContainer"></div>
                    
                       <div class="p-3 bg-white mb-20">
                        <div class="relative w-full mx-auto max-w-3xl">
                            <div class="relative bg-white rounded-lg border border-gray-300">
                                <textarea 
                                    id="chatInput"
                                    rows="1"
                                    placeholder="Message AI..."
                                    class="w-full p-2 pr-10 border-0 focus:ring-0 resize-none rounded-lg text-sm bg-transparent text-gray-700 placeholder-gray-400"
                                    style="min-height: 40px; max-height: 200px;"></textarea>
                                <button id="sendButton" class="absolute right-2 bottom-2 bg-gradient-to-r from-purple-500 to-pink-500 to-orange-400  text-white p-1.5 rounded-md hover:opacity-90 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const initialView = document.getElementById('initialView');
    const chatView = document.getElementById('chatView');
    const promptInput = document.getElementById('promptInput');
    const chatInput = document.getElementById('chatInput');
    const sendInitialPrompt = document.getElementById('sendInitialPrompt');
    const sendButton = document.getElementById('sendButton');
    const messagesContainer = document.getElementById('messagesContainer');
    const newChatButton = document.getElementById('newChatButton');
    const sidebarNewChat = document.getElementById('sidebarNewChat');

    // Store conversations
    let conversations = [];
    let currentConversation = null;

    function sendMessage(message, isInitial = false) {
        if (!message.trim()) return;

        // Add sending state UI
        const chatContainer = document.querySelector('.h-full');
        if (chatContainer) chatContainer.classList.add('message-sending');
        
        // Create new conversation if none exists
        if (!currentConversation) {
            currentConversation = {
                id: Date.now(),
                title: message.substring(0, 30),
                messages: []
            };
            conversations.push(currentConversation);
            
            // Add visual feedback for new conversation
            document.body.classList.add('new-conversation');
            setTimeout(() => document.body.classList.remove('new-conversation'), 1000);
        }

        // Add user message
        currentConversation.messages.push({
            sender: 'user',
            text: message,
            time: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })
        });

        // Switch to chat view if initial message
        if (isInitial) {
            initialView.classList.add('hidden');
            chatView.classList.remove('hidden');
            
            // Add transition effect
            chatView.classList.add('conversation-start');
            setTimeout(() => chatView.classList.remove('conversation-start'), 500);
        }

        // Add message to UI
        addMessage(message, 'user');
        
        // Clear input and remove focus
        if (isInitial) {
            promptInput.value = '';
            promptInput.blur();
            resetTextareaHeight(promptInput);
        } else {
            chatInput.value = '';
            chatInput.blur();
            resetTextareaHeight(chatInput);
        }
        
        // Show typing indicator
        const typingIndicator = document.createElement('div');
        typingIndicator.className = 'typing-indicator flex justify-start mb-4';
        typingIndicator.innerHTML = `
            <div class="flex items-start space-x-2 max-w-3xl">
                <div class="flex-shrink-0 w-8 h-8 rounded-full bg-gradient-to-r from-purple-500 to-pink-500 to-orange-400  flex items-center justify-center text-white text-xs font-bold">
                    AI
                </div>
                <div class="bg-gray-100 text-gray-700 rounded-xl px-4 py-3 text-sm">
                    <div class="flex items-center space-x-1">
                        <div class="w-1.5 h-1.5 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                        <div class="w-1.5 h-1.5 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                        <div class="w-1.5 h-1.5 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.3s"></div>
                    </div>
                </div>
            </div>
        `;
        messagesContainer.appendChild(typingIndicator);
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
        
        // Remove sending state
        setTimeout(() => {
            if (chatContainer) chatContainer.classList.remove('message-sending');
        }, 200);

        // Simulate AI response
        setTimeout(() => {
            // Remove typing indicator
            typingIndicator.remove();
            
            const response = getAIResponse(message);
            currentConversation.messages.push({
                sender: 'ai',
                text: response,
                time: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })
            });
            addMessage(response, 'ai');
            
            // Add response received effect
            if (chatContainer) chatContainer.classList.add('message-received');
            setTimeout(() => {
                if (chatContainer) chatContainer.classList.remove('message-received');
            }, 500);
            
            // Add glitch effect
            const glitch = document.createElement('div');
            glitch.className = 'absolute inset-0 bg-indigo-100 opacity-0 animate-pulse';
            glitch.style.animation = 'glitch 0.5s linear';
            document.querySelector('.h-full')?.appendChild(glitch);
            setTimeout(() => glitch.remove(), 500);
        }, 1500 + Math.random() * 1000);
    }

    function getAIResponse(message) {
        // Simple response logic - in a real app, this would call your API
        if (message.toLowerCase().includes('hello') || message.toLowerCase().includes('hi')) {
            return "Hello! How can I assist you today?";
        } else if (message.toLowerCase().includes('quantum')) {
            return "Quantum computing uses qubits which can exist in superposition, allowing parallel computations that classical computers can't perform efficiently.";
        } else if (message.toLowerCase().includes('website')) {
            return "To make a website, you'll need to: 1) Choose a domain name, 2) Get web hosting, 3) Design your site (HTML/CSS or CMS like WordPress), 4) Develop functionality (JavaScript/PHP), and 5) Publish your site.";
        } else if (message.toLowerCase().includes('poem')) {
            return "In circuits deep and code so bright,\nAI dances in the digital night.\nLearning, growing, ever wise,\nWith silicon dreams and neural skies.";
        } else {
            return "I'm an AI assistant here to help. Could you clarify or provide more details about your request?";
        }
    }

    function addMessage(text, sender) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `flex ${sender === 'user' ? 'justify-end' : 'justify-start'} mb-4`;
        
        // Generate message HTML based on sender
        if (sender === 'user') {
            messageDiv.innerHTML = `
                <div class="flex flex-row-reverse items-start max-w-3xl gap-3">
                    <div class="flex-shrink-0 w-8 h-8 rounded-full bg-gradient-to-r from-purple-500 to-pink-500 to-orange-400  flex items-center justify-center text-white text-xs font-bold">
                        {{ substr(Auth::user()->name, 0, 2) }}
                    </div>
                    
                    <div class="bg-gradient-to-r from-purple-500 to-pink-500 to-orange-400 text-white rounded-xl px-4 py-3 transition relative text-sm shadow-sm shadow-purple-100">
                        <div class="flex items-center justify-between mb-1">
                            <span class="text-xs font-medium text-pink-100">You</span>
                            <span class="text-xs opacity-80 text-pink-100">${new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}</span>
                        </div>
                        <p class="text-white">${text}</p>
                    </div>
                </div>
            `;
        } else {
            messageDiv.innerHTML = `
                <div class="flex flex-col items-start max-w-3xl">
                    <div class="flex items-start gap-3">
                        <div class="flex-shrink-0 w-8 h-8 rounded-full bg-gradient-to-r from-purple-500 to-pink-500 to-orange-400  flex items-center justify-center text-white text-xs font-bold">
                            AI
                        </div>
                        
                        <div class="bg-gray-100 text-gray-700 rounded-xl px-4 py-3 transition relative text-sm shadow-sm shadow-gray-100">
                            <div class="flex items-center justify-between mb-1">
                                <span class="text-xs font-medium text-gray-500">AI Assistant</span>
                                <span class="text-xs opacity-80 text-gray-500">${new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}</span>
                            </div>
                            <p class="text-gray-700">${text}</p>
                        </div>
                    </div>
                    
                    <div class="flex justify-start space-x-2 mt-2 ml-11">
    <!-- Export -->
    <button class="export-btn text-xs text-gray-500 hover:text-blue-600 hover:bg-blue-100/50 px-2 py-1 rounded-lg transition flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
        </svg>
    </button>
    
    <!-- Like -->
    <button class="like-btn text-xs px-2 py-1 rounded-lg transition flex items-center hover:bg-yellow-100/50">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
        </svg>
    </button>
    
    <!-- Unlike -->
    <button class="unlike-btn text-xs px-2 py-1 rounded-lg transition flex items-center hover:bg-yellow-100/50">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14H5.236a2 2 0 01-1.789-2.894l3.5-7A2 2 0 018.736 3h4.018a2 2 0 01.485.06l3.76.94m-7 10v5a2 2 0 002 2h.096c.5 0 .905-.405.905-.904 0-.715.211-1.413.608-2.008L17 13V4m-7 10h2m5-10h2a2 2 0 012 2v6a2 2 0 01-2 2h-2.5" />
        </svg>
    </button>
</div>

                </div>
            `;
            
            // Add event listeners to AI message buttons
            setTimeout(() => {
                messageDiv.querySelector('.export-btn')?.addEventListener('click', function() {
                    alert('Export functionality would be implemented here');
                    this.classList.add('text-indigo-600', 'bg-indigo-100');
                });
                
                messageDiv.querySelector('.like-btn')?.addEventListener('click', function() {
                    alert('Liked this message!');
                    this.classList.add('text-indigo-600', 'bg-indigo-100');
                    messageDiv.querySelector('.unlike-btn')?.classList.remove('text-indigo-600', 'bg-indigo-100');
                });
                
                messageDiv.querySelector('.unlike-btn')?.addEventListener('click', function() {
                    alert('Disliked this message!');
                    this.classList.add('text-indigo-600', 'bg-indigo-100');
                    messageDiv.querySelector('.like-btn')?.classList.remove('text-indigo-600', 'bg-indigo-100');
                });
            }, 10);
        }
        
        messagesContainer.appendChild(messageDiv);
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
        
        // Add animation
        messageDiv.style.opacity = '0';
        messageDiv.style.transform = sender === 'user' ? 'translateX(10px)' : 'translateX(-10px)';
        setTimeout(() => {
            messageDiv.style.transition = 'all 0.3s ease-out';
            messageDiv.style.opacity = '1';
            messageDiv.style.transform = 'translateX(0)';
        }, 10);
    }

    function startNewChat() {
        // Add transition effect
        chatView.classList.add('conversation-end');
        setTimeout(() => {
            initialView.classList.remove('hidden');
            chatView.classList.add('hidden');
            messagesContainer.innerHTML = '';
            currentConversation = null;
            chatView.classList.remove('conversation-end');
        }, 300);
    }

    function resetTextareaHeight(textarea) {
        textarea.style.height = 'auto';
        textarea.style.height = '40px';
    }

    function adjustTextareaHeight(textarea) {
        textarea.style.height = 'auto';
        textarea.style.height = Math.min(textarea.scrollHeight, 200) + 'px';
    }

    // Event listeners
    if (sendInitialPrompt && promptInput) {
        sendInitialPrompt.addEventListener('click', () => {
            const message = promptInput.value.trim();
            if (message) {
                sendMessage(message, true);
            }
        });
        
        promptInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                const message = promptInput.value.trim();
                if (message) {
                    sendMessage(message, true);
                }
            }
        });
    }
    
    if (sendButton && chatInput) {
        sendButton.addEventListener('click', () => {
            const message = chatInput.value.trim();
            if (message) {
                sendMessage(message);
            }
        });
        
        chatInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                const message = chatInput.value.trim();
                if (message) {
                    sendMessage(message);
                }
            }
        });
    }

    if (newChatButton) {
        newChatButton.addEventListener('click', startNewChat);
    }
    
    if (sidebarNewChat) {
        sidebarNewChat.addEventListener('click', startNewChat);
    }

    // Auto-resize textareas
    [promptInput, chatInput].forEach(textarea => {
        if (textarea) {
            textarea.addEventListener('input', function() {
                adjustTextareaHeight(this);
            });
            resetTextareaHeight(textarea);
        }
    });
});
</script>

<style>
    html, body {
        height: 100%;
        overflow: hidden;
        margin: 0;
        padding: 0;
    }
    
    /* Custom scrollbar */
    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: rgba(0, 0, 0, 0.05);
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: rgba(0, 0, 0, 0.2);
        border-radius: 3px;
    }
    
    /* Message animations */
    @keyframes message-user-enter {
        0% { transform: translateY(5px) translateX(10px); opacity: 0; }
        100% { transform: translateY(0) translateX(0); opacity: 1; }
    }
    
    @keyframes message-ai-enter {
        0% { transform: translateY(5px) translateX(-10px); opacity: 0; }
        100% { transform: translateY(0) translateX(0); opacity: 1; }
    }
    
    /* Conversation transitions */
    .conversation-start {
        animation: conversation-start 0.3s ease-out;
    }
    
    .conversation-end {
        animation: conversation-end 0.3s ease-out;
    }
    
    @keyframes conversation-start {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes conversation-end {
        0% { opacity: 1; transform: translateY(0); }
        100% { opacity: 0; transform: translateY(20px); }
    }
    
    /* State animations */
    .message-sending {
        position: relative;
    }
    
    .message-sending::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(79, 70, 229, 0.03);
        pointer-events: none;
        animation: sending-pulse 0.6s ease-out;
    }
    
    .message-received {
        position: relative;
    }
    
    .message-received::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(79, 70, 229, 0.03);
        pointer-events: none;
        animation: received-pulse 0.6s ease-out;
    }
    
    .new-conversation {
        animation: new-conversation-pulse 1s ease-out;
    }
    
    @keyframes sending-pulse {
        0% { opacity: 0; }
        50% { opacity: 0.3; }
        100% { opacity: 0; }
    }
    
    @keyframes received-pulse {
        0% { opacity: 0; }
        50% { opacity: 0.3; }
        100% { opacity: 0; }
    }
    
    @keyframes new-conversation-pulse {
        0% { background-color: rgba(79, 70, 229, 0); }
        20% { background-color: rgba(79, 70, 229, 0.1); }
        100% { background-color: rgba(79, 70, 229, 0); }
    }
    
    /* Enhanced glitch effect */
    @keyframes glitch {
        0% { opacity: 0.05; transform: translateX(0); }
        20% { opacity: 0.1; transform: translateX(-2px); }
        40% { opacity: 0.03; transform: translateX(2px); }
        60% { opacity: 0.08; transform: translateX(0); }
        80% { opacity: 0.02; transform: translateX(-1px); }
        100% { opacity: 0; transform: translateX(0); }
    }
    
    /* Typing indicator animation */
    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-3px); }
    }
    
    .animate-bounce {
        animation: bounce 0.6s infinite;
    }
</style>
@endsection