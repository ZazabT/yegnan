import { useState } from "react";
import userAuthStore from "../../store/userAuthStore";
import { useNavigate } from "react-router-dom";

const Register = () => {
    const { register, error, loading } = userAuthStore();
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");
    const [name, setName] = useState("");
    const [password_confirmation, setConfirm] = useState("");
    const navigate = useNavigate();

    const handleSubmit = async (e) => {
        e.preventDefault();
        try {
            await register(name, email, password, password_confirmation);
            navigate('/');
        } catch (err) {
            console.log(err);
        }
    };

    return (
        <div className="flex items-center justify-center min-h-screen bg-gray-100">
            <div className="bg-white p-10 rounded shadow-lg w-96">
                <h2 className="text-3xl mb-6 text-center font-bold text-blue-600">Signup</h2>
                {loading && <p className="text-center">Loading...</p>}
                {error && <p className="text-red-500 text-center">{error}</p>}
                <form onSubmit={handleSubmit}>
                    <div className="mb-5">
                        <label className="block text-sm font-medium mb-2" htmlFor="name">
                            Name
                        </label>
                        <input
                            type="text"
                            id="name"
                            value={name}
                            onChange={(e) => setName(e.target.value)}
                            className="w-full p-3 border border-gray-300 rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
                            required
                        />
                    </div>
                    <div className="mb-5">
                        <label className="block text-sm font-medium mb-2" htmlFor="email">
                            Email
                        </label>
                        <input
                            type="email"
                            id="email"
                            value={email}
                            onChange={(e) => setEmail(e.target.value)}
                            className="w-full p-3 border border-gray-300 rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
                            required
                        />
                    </div>
                    <div className="mb-5">
                        <label className="block text-sm font-medium mb-2" htmlFor="password">
                            Password
                        </label>
                        <input
                            type="password"
                            id="password"
                            value={password}
                            onChange={(e) => setPassword(e.target.value)}
                            className="w-full p-3 border border-gray-300 rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
                            required
                        />
                    </div>
                    <div className="mb-5">
                        <label className="block text-sm font-medium mb-2" htmlFor="confirm">
                            Confirm Password
                        </label>
                        <input
                            type="password"
                            id="confirm"
                            value={password_confirmation}
                            onChange={(e) => setConfirm(e.target.value)}
                            className="w-full p-3 border border-gray-300 rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
                            required
                        />
                    </div>
                    <button
                        type="submit"
                        className="w-full bg-blue-600 text-white p-3 rounded hover:bg-blue-700 transition duration-200"
                    >
                        Register
                    </button>
                </form>
                <div className="mt-4 text-center">
                    <a href="/login" className="text-blue-600 hover:underline">
                        Already have an account? Login
                    </a>
                </div>
            </div>
        </div>
    );
};

export default Register;
