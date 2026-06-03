import type { MetadataRoute } from "next";

export default function manifest(): MetadataRoute.Manifest {
  return {
    name: "Pragathi Power Solutions",
    short_name: "Pragathi Power",
    description: "Solar power solutions in Tirupati — Authorised TATA Power Solar Partner.",
    start_url: "/",
    display: "standalone",
    background_color: "#fffbf3",
    theme_color: "#1d2f7e",
    icons: [
      { src: "/icon.png", sizes: "512x512", type: "image/png", purpose: "any" },
      { src: "/apple-icon.png", sizes: "180x180", type: "image/png" },
    ],
  };
}
