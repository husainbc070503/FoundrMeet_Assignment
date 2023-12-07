import { useAuth0 } from "@auth0/auth0-react";
import LoginButton from "./components/LoginButton";
import UserProfile from "./components/UserProfile";
import Navbar from "./components/Navbar";

function App() {
  const { user, isAuthenticated } = useAuth0();
  return (
    <>
      <Navbar />
      {!isAuthenticated ? (
        <LoginButton />
      ) : (
        <UserProfile name={user?.name} picture={user?.picture} />
      )}
    </>
  );
}

export default App;
