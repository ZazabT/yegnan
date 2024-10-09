import axios from "axios";
import { create } from "zustand";

const userAuthStore = create((set) => ({
    user: null,
    error: null, 
    token: localStorage.getItem('token') || null,
    isAuthenticated: !!localStorage.getItem('token'),
    loading: false,

    // Login
    login: async (email, password) => {
        set({ loading: true, error: null });

        try {
            const response = await axios.post('http://localhost:8000/api/login', { email, password });
            if (response.data.success) {
                set({
                    user: response.data.user,
                    token: response.data.access_token,
                    isAuthenticated: true,
                    error: null
                });
                localStorage.setItem('token', response.data.access_token);
            } else {
                set({ error: response.data.message });
            }
        } catch (err) {
            console.error(err);
            set({ error: 'Login failed. Please try again.' });
        } finally {
            set({ loading: false });
        }
    },

    // Logout
    logout: async () => {
        const token = localStorage.getItem('token');
        if (!token) return;

        try {
            const response = await axios.post('http://localhost:8000/api/logout', {}, {
                headers: { Authorization: `Bearer ${token}` }
            });

            if (response.data.success) {
                set({ user: null, token: null, isAuthenticated: false });
                localStorage.removeItem('token');
            }
        } catch (err) {
            console.error(err);
            set({ error: 'Logout failed. Please try again.' });
        }
    },
    
    // Register
    register: async (  name, email, password, password_confirmation) => {
        set({ loading: true, error: null });
    
        try {
            const response = await axios.post('http://localhost:8000/api/register', { 
                name, email, password, password_confirmation 
            });
            if (response.data.success) {
                set({
                    user: response.data.user,
                    token: response.data.access_token,
                    isAuthenticated: true,
                    error: null
                });
                localStorage.setItem('token', response.data.access_token);
            } else {
                set({ error: response.data.message });
            }
        } catch (err) {
            console.error('Registration error:', err.response.data);
            set({ error: 'Registration failed. Please try again.' });
        } finally {
            set({ loading: false });
        }
    },
    
    // Check if user is authenticated
    checkAuth: async () => {
        const token = localStorage.getItem('token');
        set({ loading: true });
    
        if (token) {
            try {
                const response = await axios.get('http://localhost:8000/api/user', {
                    headers: {
                        Authorization: `Bearer ${token}`,
                    },
                });
    
    
                set({
                    user: response.data,
                    token,
                    loading: false, 
                    isAuthenticated: true
                });
            } catch (error) {
                console.error('Token validation failed:', error);
                localStorage.removeItem('token');
                set({
                    user: null,
                    token: null,
                    loading: false, 
                    isAuthenticated: false,
                });
            }
        } else {
            console.log('No token found.');
            set({ loading: false, isAuthenticated: false }); 
        }
    }}));
    


export default userAuthStore;
