import React from "react";
import { useAuth0 } from "@auth0/auth0-react";
import Img from "../assets/Sign-In-Large---Active.png";
import Button from "@mui/material/Button";

const LoginButton = () => {
  const { loginWithRedirect } = useAuth0();

  return (
    <Button
      variant="contained"
      color="secondary"
      onClick={() => loginWithRedirect()}
      className="position-absolute top-50 start-50 translate-middle"
    >
      <img src={Img} alt="image" />
    </Button>
  );
};

export default LoginButton;
