import { useEffect } from "react";
import userAuthStore from "../store/userAuthStore";

const Home = () => {
    const { user, checkAuth, loading, isAuthenticated, logout } = userAuthStore();

    // Fetch the user if the user is logged in
    useEffect(() => {
        const fetchUser = async () => {
            await checkAuth();
        };

        fetchUser();
    }, [checkAuth]);

    // Loading state handling
    if (loading) {
        return <div>Loading...</div>;
    }

    // Logout
    const logoutUser = async () => {
        await logout();
    };

    return (
        <div>
            {isAuthenticated ? (
                <div>
                    {/* Check if user exists before accessing user.name */}
                    <h1>Welcome, {user?.name || 'User'}!</h1>
                    <button onClick={logoutUser}>Logout</button>
                </div>
            ) : (
                <div>
                    <p>Hello there, login to your account</p>
                    <a href="/login">Login</a>
                </div>
            )}
        </div>
    );
};

export default Home;
