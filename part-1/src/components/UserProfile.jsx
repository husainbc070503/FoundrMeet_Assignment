import * as React from "react";
import Button from "@mui/material/Button";
import Typography from "@mui/material/Typography";
import { useAuth0 } from "@auth0/auth0-react";
import { Box } from "@mui/system";

const UserProfile = ({ name, picture }) => {
  const { logout } = useAuth0();

  return (
    <Box className="Box user-card">
      <div className="image">
        <img src={picture} alt="user-profile" className="rounded-2" />
      </div>
      <Typography fontSize={30} fontWeight="bold" my={3} color="primary">
        {name}
      </Typography>
      <Button
        variant="contained"
        color="secondary"
        onClick={() =>
          logout({ logoutParams: { returnTo: window.location.origin } })
        }
      >
        Logout
      </Button>
    </Box>
  );
};

export default UserProfile;
