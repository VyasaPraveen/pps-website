import Image from "next/image";

type LogoProps = {
  variant?: "mark" | "full";
  className?: string;
  priority?: boolean;
};

export function Logo({ variant = "mark", className, priority }: LogoProps) {
  if (variant === "full") {
    return (
      <Image
        src="/pps-logo-full.png"
        alt="Pragathi Power Solutions — Power from the Sun to Power Everyone"
        width={4379}
        height={630}
        priority={priority}
        className={className}
      />
    );
  }
  return (
    <Image
      src="/pps-logo-mark.png"
      alt="Pragathi Power Solutions logo"
      width={1419}
      height={630}
      priority={priority}
      className={className}
    />
  );
}
